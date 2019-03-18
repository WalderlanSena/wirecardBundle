<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 17/03/19
 * Time: 02:22
 */

namespace App\Bundles\WirecardBundle\Exception;

use Throwable;

class WirecardErrorException extends \Exception
{
    private $errors;

    public function __construct(string $message = "", int $code = 0, array $errors = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getErrorsApi() : array
    {
        return $this->errors;
    }
}