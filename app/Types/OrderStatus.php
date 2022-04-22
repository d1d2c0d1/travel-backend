<?php

namespace App\Types;

class OrderStatus extends ExtendedType
{

    public string $title = 'Ожидает оплаты';
    public string $comment = 'Бронирование только создано';
    public string $reason = 'Клиент создал бронирование';
    public string $color = '#00AAEE';

    /**
     * Constructor
     *
     * @param int $status
     */
    public function __construct(int $status = 0)
    {

        switch ($status) {
            case 0:
                $this->title = 'Ожидает оплаты';
                $this->comment = 'Бронирование только создано';
                $this->reason = 'Клиент создал бронирование';
                $this->color = '#00AAEE';
                break;

            case 1:
                $this->title = 'Бронь отменена';
                $this->comment = 'Гид отменил бронирование';
                $this->reason = '';
                $this->color = '#FF3A44';
                break;

            case 2:
                $this->title = 'Забронированно';
                $this->comment = 'Бронирование подтверждено гидом';
                $this->reason = 'Гид подтвердил бронирование';
                $this->color = '#15CF74';
                break;

            case 3:
                $this->title = 'Ожидает';
                $this->comment = 'Бронирование оплачено и ожидает подтверждения гида';
                $this->reason = 'Гид рассматривает бронирование';
                $this->color = '#00C2F3';
                break;

            default:
                $this->title = 'Ошибка бронирования';
                $this->comment = 'У бронирования не известный статус';
                $this->reason = 'Не известно';
                $this->color = '#AAAAAA';
                break;
        }

    }

}
