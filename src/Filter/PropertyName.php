<?php

namespace Zend\Hydrator\Doctrine\Filter;

use Zend\Hydrator\Filter\FilterInterface;

/**
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author  Liam O'Boyle <liam@ontheroad.net.nz>
 */
class PropertyName implements FilterInterface
{
    /**
     * The propteries to exclude.
     *
     * @var array
     */
    protected $properties = [];

    /**
     * Either an exclude or an include.
     *
     * @var bool
     */
    protected $exclude = null;

    /**
     * @param [ string | array ] $properties The properties to exclude or include.
     * @param bool               $exclude    If the method should be excluded
     */
    public function __construct($properties, $exclude = true)
    {
        $this->exclude    = $exclude;
        $this->properties = is_array($properties)
            ? $properties
            : [$properties];
    }

    public function filter($property)
    {
        return in_array($property, $this->properties)
            ? ! $this->exclude
            : $this->exclude;
    }
}
