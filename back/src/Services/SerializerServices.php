<?php

namespace App\Services;

use Symfony\Component\Serializer\Encoder\{
    JsonEncoder,
    XmlEncoder
};
use Symfony\Component\Serializer\{
    Serializer,
    Normalizer\ObjectNormalizer
};

class SerializerServices
{
    private Serializer $serializer;
    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new XmlEncoder(), new JsonEncoder()]);
    }

    /**
     * @param array $array
     * @return string
     */
    public function serializedObject(array $array): string
    {
        return $this->serializer->serialize($array,'json');
    }
}