<?php
/**
 * @copyright Copyright (c) 2014 Orange Applications for Business
 * @link      http://github.com/kambalabs for the sources repositories
 *
 * This file is part of Kamba.
 *
 * Kamba is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Kamba is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kamba.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace KmbDomain\Model;

class Value implements ValueInterface
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var ParameterInterface */
    protected $parameter;

    /**
     * @param string             $name
     * @param ParameterInterface $parameter
     */
    public function __construct($name = null, $parameter = null)
    {
        $this->name = $name;
        $this->parameter = $parameter;
    }

    /**
     * Set Id.
     *
     * @param int $id
     * @return Value
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get Id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Name.
     *
     * @param string $name
     * @return Value
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Parameter.
     *
     * @param \KmbDomain\Model\ParameterInterface $parameter
     * @return Value
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
        return $this;
    }

    /**
     * Get Parameter.
     *
     * @return \KmbDomain\Model\ParameterInterface
     */
    public function getParameter()
    {
        return $this->parameter;
    }
}
