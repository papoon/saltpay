<?php

namespace v1;

use Services\FactoryServicePlayWithStrings;
use Luracast\Restler\RestException;

class PlayWithStrings
{

    /**
     *
     * @url GET /hello/
     *
     * @return array
     * @throws RestException
     */
    public function hello(): string
    {
        return 'Hello';
    }

    /**
     *
     * @url POST /countchar/
     *
     * @return array
     * @throws RestException
     */
    public function countEachCharOf(array $data)
    {
        try {
            return [
                'status' => true,
                'data'   => FactoryServicePlayWithStrings::getInstance()->getAsteriskNumberOfCharInText($data['text'])
            ];
        } catch (\UnexpectedValueException $e) {
            throw new RestException(400, '', ['status' => false, 'message' => $e->getMessage()]);
        } catch (\Exception $e) {
            throw new RestException(500, '', ['status' => false, 'message' => 'Error']);
        }
    }
}
