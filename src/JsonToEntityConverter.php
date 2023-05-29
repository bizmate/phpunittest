<?php

namespace Bizmate\PhpunitTest;

class JsonToEntityConverter
{
    public static function convertToEntity(string $json, string $className): string
    {
        $data = json_decode($json, true);
        
        $classDefinition = "class $className\n{\n";
        
        $propertiesOutput = "";
        $constructorOutput = "";
        $constructorArguments = "";
        $constructorAssignment = "";
        $methodsOutput = "";
        $subclassesDefinitions = "";
    
        // Generate code
        $constructorOutput .= "    public function __construct(";
        foreach ($data as $key => $value) {
            $propertyName = self::convertToCamelCase($key);
            $methodName = ucfirst($propertyName);
    
            // if array detected then generate subclass
            if (is_array($value)) {
                $subClassName = ucfirst($propertyName);
                $subClassDefinition = self::convertToEntity(json_encode($value), $subClassName);
                $subclassesDefinitions .= "\n\n$subClassDefinition\n";
                $propertiesOutput .= "    private $subClassName $$propertyName;\n";
                $constructorArguments .= "$subClassName $$propertyName, ";
                $constructorAssignment .= "        \$this->$propertyName = \$$propertyName;\n";
                $methodsOutput .= "    public function get$methodName(): $subClassName\n    {\n";
                $methodsOutput .= "        return \$this->$propertyName;\n    }\n\n";
                $methodsOutput .= "    public function set$methodName($subClassName \$$propertyName)\n    {\n";
                $methodsOutput .= "        \$this->$propertyName = \$$propertyName;\n    }\n\n";
            } else {
                // declare properties
                $propertiesOutput .= "    private $$propertyName;\n";
                // Generate arguments
                $constructorArguments .= "$$propertyName, ";
                //Generate Constructor assignment
                $constructorAssignment .= "        \$this->$propertyName = \$$propertyName;\n";
                // Generate getters and setters
                $methodsOutput .= "    public function get$methodName()\n    {\n";
                $methodsOutput .= "        return \$this->$propertyName;\n    }\n\n";
                $methodsOutput .= "    public function set$methodName(\$$propertyName)\n    {\n";
                $methodsOutput .= "        \$this->$propertyName = \$$propertyName;\n    }\n\n";
            }
        }
        $constructorOutput .= rtrim($constructorArguments, ', ');
        $constructorOutput .= ")\n    {\n";
        $constructorOutput .= $constructorAssignment;
        $constructorOutput .= "    }\n\n";
    
        $classDefinition .= $propertiesOutput;
        $classDefinition .= $constructorOutput;
        $classDefinition .= $methodsOutput;
        
        $classDefinition .= "}";
        
        $classDefinition .= $subclassesDefinitions;
        
        return $classDefinition;
    }
    
    private static function convertToCamelCase(string $string): string
    {
        $words = explode('_', $string);
        $camelCase = '';
        
        foreach ($words as $index => $word) {
            $camelCase .= ($index === 0) ? lcfirst($word) : ucfirst($word);
        }
        
        return $camelCase;
    }
}

$json = '{
      "id": "CQ1cQUACqXe4-m1gIqqncA",
      "url": "https://www.yelp.com/biz/tomato-joes-pizza-express-santa-clarita?adjust_creative=5UWkbSgFRIOdevprXJqQMQ&hrid=CQ1cQUACqXe4-m1gIqqncA&utm_campaign=yelp_api_v3&utm_medium=api_v3_business_reviews&utm_source=5UWkbSgFRIOdevprXJqQMQ",
      "text": "Come here for great pizzas! Easy parking, beautiful lobby and outdoor seating  order the concepts half and half!",
      "rating": 5,
      "time_created": "2023-04-24 00:34:39",
      "user": {
        "id": "1UX78lqH76rU2tDW1JXjMA",
        "profile_url": "https://www.yelp.com/user_details?userid=1UX78lqH76rU2tDW1JXjMA",
        "image_url": "https://s3-media3.fl.yelpcdn.com/photo/1hcAXZu1zrcaXzWfRAXYSw/o.jpg",
        "name": "Brian D."
      }
    }'; // Your JSON string
$className = 'Reviews'; // The desired name of the PHP class

$classDefinition = JsonToEntityConverter::convertToEntity($json, $className);
echo $classDefinition;
