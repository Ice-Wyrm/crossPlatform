<?php


namespace App\Entity;


use App\DTO\AbstractDto;

abstract class AbstractEntity implements \JsonSerializable
{
    public function JsonSerialize()
    {
        $dto = $this->getDtoObject();
        foreach (get_object_vars($dto) as $key => $value) {
            $getMethod = $this->generateMethod($key);
            $dto->$key = $this->$getMethod();
        }
        return $dto;
    }

    private function generateMethod($key, $action = 'get')
    {
        $key = explode('_', $key);
        $key = array_map('ucfirst', $key);
        $method = $action . implode('', $key);
        return $method;
    }

    public function getDtoObject()
    {
        return new AbstractDto();
    }
}