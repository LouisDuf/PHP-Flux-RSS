<?php

namespace metier;

    use DateTime;

    class News
    {
        private int $id;
        private string $title;
        private string $description;
        private string $url;
        private string $guid;
        private DateTime $date;
        private int $flux;

        /**
         * @param int $id
         * @param string $title
         * @param string $description
         * @param string $url
         * @param string $guid
         * @param DateTime $date
         * @param int $flux
         */
        public function __construct(int $id,
                                    string $title,
                                    string $description,
                                    string $url,
                                    string $guid,
                                    DateTime $date,
                                    int $flux)
        {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->url = $url;
            $this->guid = $guid;
            $this->date = $date;
            $this->flux = $flux;
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
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * @return string
         */
        public function getGuid(): string
        {
            return $this->guid;
        }

        /**
         * @return string
         */
        public function getDate() : DateTime
        {
            return $this->date;
        }

        /**
         * @return int
         */
        public function getFlux(): int
        {
            return $this->flux;
        }

    }
