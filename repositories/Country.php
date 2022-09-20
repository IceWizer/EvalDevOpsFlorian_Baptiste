<?php
namespace Entity;

require_once dirname(__FILE__) . '/Entity.php';

/**
 * Description of Country
 *
 * @author Florian
 */
class Country extends Entity
{
    private $label;

    public function __construct($p_identifier, $p_label)
    {
        parent::__construct($p_identifier);

        $this->label = $p_label;
    }

    public static function __constructStatic($p_identifier, $p_label)
    {
        return new Country($p_identifier, $p_label);
    }

    public function getLabel()
    {
        return $this->label;
    }

    public static function insert($label)
    {
        $sql = 'INSERT INTO Country (label) VALUES (:label)';

        \myPDO\MyPDO::InsertDelete($sql, array(':label' => $label));
    }

    public function view()
    {
        echo "<td>" . htmlspecialchars($this->identifier) . "</td>";
        echo "<td>" . htmlspecialchars($this->label) . "</td>";
        echo "<td class=\"col-3\">";
        echo '<a class="btn btn-info" href="./country.php?identifier=' . $this->identifier . '">Détails</a>';
        echo "</td>";
    }

    public static function getCountries()
    {
        $sql = 'SELECT Country.identifier, Country.label
                FROM Country';

        $countries = array();

        $countriesRaw = \myPDO\MyPDO::Select($sql, array());
        $countriesFetch = $countriesRaw->FetchAll(\PDO::FETCH_FUNC, "\Entity\Country::__constructStatic");

        foreach ($countriesFetch as $country) {
            $countries[] = $country;
        }

        return $countries;
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
