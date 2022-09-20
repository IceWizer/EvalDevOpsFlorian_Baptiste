<?php

require_once dirname(__FILE__) . '/Entity.php';

/**
 * Description of Region
 *
 * @author Florian
 */
namespace Entity
{
    class Department extends Entity
    {
        private $label;
        private $region;
        private $departmentNumber;

        public function __construct($p_identifier, $p_label, $p_departmentNumber, $p_region)
        {
            parent::__construct($p_identifier);

            $this->label = $p_label;
            $this->region = $p_region;
            $this->departmentNumber = $p_departmentNumber;
        }

        public static function __constructStatic($p_identifier, $p_label, $p_departmentNumber, $p_region)
        {
            return new Department($p_identifier, $p_label, $p_departmentNumber, $p_region);
        }

        public function getLabel()
        {
            return $this->label;
        }

        public function getRegion() 
        {
            return $this->region;
        }

        public static function insert($label, $regionIdentifier, $departmentNumber)
        {
            $sql = 'INSERT INTO Department (label, department_number, region) VALUES (:label, :department_number, :region)';
            
            \myPDO\MyPDO::InsertDelete($sql, array(':label' => $label, ':department_number' => $departmentNumber, ':region' => $regionIdentifier));
        }

        public function view()
        {
            echo "<td>" . htmlspecialchars($this->identifier) . "</td>";
            echo "<td>" . htmlspecialchars($this->label) . "</td>";
            echo "<td>" . htmlspecialchars($this->departmentNumber) . "</td>";
        }

        public static function getDepartments()
        {
            $sql = 'SELECT Department.identifier, Department.label, Department.department_number, Department.region
                    FROM Department';

            $departments = array();
            
            $departmentRaw = \myPDO\MyPDO::Select($sql, array());
            $departmentFetch = $departmentRaw->FetchAll(\PDO::FETCH_FUNC, "Department::__constructStatic");
            
            foreach ($departmentFetch as $department)
            {
                $departments[] = $department;
            }
            
            return $departments;
        }

        public static function getDepartmentsWithRegion(int $region)
        {
            $sql = 'SELECT Department.identifier, Department.label, Department.department_number, Department.region
                    FROM Department
                    WHERE Department.region = :region';

            $departments = array();

            $departmentRaw = \myPDO\MyPDO::Select($sql, array(':region' => $region));
            $departmentFetch = $departmentRaw->FetchAll(\PDO::FETCH_FUNC, "Department::__constructStatic");

            foreach ($departmentFetch as $department) {
                $departments[] = $department;
            }

            return $departments;
        }

        public function jsonSerialize(): array
        {
            return [
                'identifier' => $this->identifier,
                'label' => $this->label
                    ];
        }

        public function toArray(): array
        {
            return [
                'identifier' => $this->identifier,
                'label' => $this->label
                    ];
        }
    }
}
