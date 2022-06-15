<?php

class Computer
{

    public $brand;
    public MotherBoard $board;
    public array $chips;

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return MotherBoard
     */
    public function getBoard(): MotherBoard
    {
        return $this->board;
    }

    /**
     * @param MotherBoard $board
     */
    public function setBoard(MotherBoard $board): void
    {
        $this->board = $board;
    }

    /**
     * @return array
     */
    public function getChips(): array
    {
        return $this->chips;
    }

    /**
     * @param array $chips
     */
    public function setChips(array $chips): void
    {
        $this->chips = $chips;
    }





}