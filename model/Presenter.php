<?php

abstract class Presenter
{
    protected ?array $get;
    protected ?array $post;

    /**
     * Process the given data and store the data to display in the $dataToDisplay attribute
     * @param array|null $get The $_GET array
     * @param array|null $post The $_POST array
     */
    protected function __construct(?array $get, ?array $post)
    {
        $this->get = $get;
        $this->post = $post;
        $this->checkProcess();
    }

    /**
     * Check if the data is valid and process it
     */
    protected abstract function checkProcess() : void;


    /**
     * @return array<string, string> The data to be displayed
     */
    public abstract function formatDisplay() : array;
}