<?php
header("Content-type:text/html;charset=utf-8");

class Structure
{
    private $xml = "";
    private $data = array();

    function __construct()
    {
        $this->xml = simplexml_load_string(file_get_contents("structure.xml"));
    }

    function getCampus()
    {
        return $this->xml->xpath('//campus');
    }

    function getSchools($campus)
    {
        $result = $this->xml->xpath('//campus[@name="' . $campus . '"]/school');
        foreach ($result as $a) {
            $this->data[] = $a["name"];
        }
        return $this->data;
    }

    function getMajors($school)
    {
        $result = $this->xml->xpath('//school[@name="' . $school . '"]/majors/major');
        foreach ($result as $a) {
            $this->data[] = $a["name"];
        }
        return $this->data;

    }

    function getClasses($major)
    {
        $result = $this->xml->xpath('//major[@name="' . $major . '"]/classes/class');
        foreach ($result as $a) {
            $this->data[] = $a;
        }
        return $this->data;
    }
}

?>