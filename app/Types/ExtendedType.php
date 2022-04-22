<?php

namespace App\Types;

abstract class ExtendedType
{

    /**
     * Prepare array from object
     *
     * @return array
     */
    public function expose(): array
    {
        return get_object_vars($this);
    }

    /**
     * Parsing object to JSON
     *
     * @param array $fields
     * @return string
     */
    public function jsonSerialize(array $fields = []): string
    {

        $data = [];

        if( !empty($fields) ) {
            foreach ($fields as $field) {
                $data[$field] = $this->$field; // bad practice!!
            }
        }

        return json_encode(get_object_vars($this));
    }

}
