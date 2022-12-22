<?php

namespace Metier;

class Flux
{
    private int $id;
    private string $title;
    private string $path;
    private string $link;
    private string $description;

    /**
     * @param int $id
     * @param string $title
     * @param string $path
     * @param string $link
     * @param string $description
     */
    public function __construct(int $id, string $title, string $path, string $link, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->path = $path;
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}