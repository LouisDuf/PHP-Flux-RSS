<?php

namespace modele;

class Flux
{
    private int $id;
    private string $title;
    private string $path;
    private string $link;
    private string $description;
    private string $image_url;
    private string $image_titre;
    private string $image_link;

    /**
     * @param int $id
     * @param string $title
     * @param string $path
     * @param string $link
     * @param string $description
     * @param string $image_url
     * @param string $image_titre
     * @param string $image_link
     */
    public function __construct(int $id, string $title, string $path, string $link, string $description, string $image_url, string $image_titre, string $image_link)
    {
        $this->id = $id;
        $this->title = $title;
        $this->path = $path;
        $this->link = $link;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->image_titre = $image_titre;
        $this->image_link = $image_link;
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

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @return string
     */
    public function getImageTitre(): string
    {
        return $this->image_titre;
    }

    /**
     * @return string
     */
    public function getImageLink(): string
    {
        return $this->image_link;
    }

}