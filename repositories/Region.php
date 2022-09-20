<?php
namespace Entity;

require_once dirname(__FILE__) . '/Entity.php';

/**
 * Description of Region
 *
 * @author Florian
 */
class Region extends Entity
{
    private $label;
    private $country;

    public function __construct($p_identifier, $p_label, $p_country)
    {
        parent::__construct($p_identifier);

        $this->label = $p_label;
        $this->country = $p_country;
    }

    public static function __constructStatic($p_identifier, $p_label, $p_country)
    {
        return new Region($p_identifier, $p_label, $p_country);
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public static function insert($label, $countryIdentifier)
    {
        $sql = 'INSERT INTO Region (label, country) VALUES (:label, :country)';

        \myPDO\MyPDO::InsertDelete($sql, array(':label' => $label, ':country' => $countryIdentifier));
    }

    public function view()
    {
        echo "<td>" . htmlspecialchars($this->identifier) . "</td>";
        echo "<td>" . htmlspecialchars($this->label) . "</td>";
        echo "<td>";
        echo '<a class="btn btn-info" href="./region.php?identifier=' . $this->identifier . '">Détails</a>';
        echo "</td>";
    }

    public static function getRegions()
    {
        $sql = 'SELECT Region.identifier, Region.label, Region.country
                FROM Region';

        $regions = array();

        $regionRaw = \myPDO\MyPDO::Select($sql, array());
        $regionFetch = $regionRaw->FetchAll(\PDO::FETCH_FUNC, "region::__constructStatic");

        foreach ($regionFetch as $region) {
            $regions[] = $region;
        }

        return $regions;
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
