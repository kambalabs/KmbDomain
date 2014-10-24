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

use Zend\Validator\AbstractValidator;
use Zend\Validator\Exception;

class GroupClassValidator extends AbstractValidator
{
    const MSG_MISSING_REQUIRED_PARAMETER = 'missingRequiredParameter';

    protected $messageTemplates;

    public function __construct($options = null)
    {
        $this->messageTemplates = [
            self::MSG_MISSING_REQUIRED_PARAMETER => $this->translate("Required parameter '%value%' is missing"),
        ];
        parent::__construct($options);
    }

    /**
     * Returns true if and only if $value meets the validation requirements
     *
     * If $value fails validation, then this method returns false, and
     * getMessages() will return an array of messages that explain why the
     * validation failed.
     *
     * @param  mixed $value
     * @return bool
     * @throws Exception\RuntimeException If validation of $value is impossible
     */
    public function isValid($value)
    {
        return true;
    }

    /**
     * Awful hack to allow POEdit to detect messages to translate.
     *
     * @param string $text
     * @return string
     */
    protected function translate($text)
    {
        return $text;
    }
}
