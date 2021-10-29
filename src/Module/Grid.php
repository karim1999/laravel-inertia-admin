<?php

namespace Karim\LaravelInertiaAdmin\Module;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Karim\LaravelInertiaAdmin\Module\Grid\Column;

/**
 *
 */
class Grid implements Arrayable, Jsonable, JsonSerializable
{
    /**
     * @var bool
     */
    protected $bordered= false;
    /**
     * @var array
     */
    protected $columns= [];

    //Later Support
    //    protected $expandable= [];
    /**
     * @var null
     */
    protected $footer= "hi";
    /**
     * @var string
     */
    protected $rowClassName= "";
    /**
     * @var string
     */
    protected $rowKey= "id";
    /**
     * @var bool
     */
    protected $showHeader= true;
    /**
     * @var bool
     */
    protected $showSorterTooltip= true;
    //default | middle | small
    /**
     * @var string
     */
    protected $size= "default";
    /**
     * @var string[]
     */
    protected $sortDirections= ["ascend", "descend"];
    /**
     * @var bool
     */
    protected $sticky= false;
    /**
     * @var null
     */
    protected $summary= null;

    /**
     * @return bool
     */
    public function isBordered(): bool
    {
        return $this->bordered;
    }

    /**
     * @param bool $bordered
     * @return Grid
     */
    public function setBordered(bool $bordered): Grid
    {
        $this->bordered = $bordered;
        return $this;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     * @return Grid
     */
    public function addColumns(Column ...$columns): Grid
    {
        $this->columns= array_merge($this->getColumns(), $columns);
        return $this;
    }
    /**
     * @param array $columns
     * @return Grid
     */
    public function setColumns(array $columns): Grid
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return null
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param null $footer
     * @return Grid
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return string
     */
    public function getRowClassName(): string
    {
        return $this->rowClassName;
    }

    /**
     * @param string $rowClassName
     * @return Grid
     */
    public function setRowClassName(string $rowClassName): Grid
    {
        $this->rowClassName = $rowClassName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRowKey(): string
    {
        return $this->rowKey;
    }

    /**
     * @param string $rowKey
     * @return Grid
     */
    public function setRowKey(string $rowKey): Grid
    {
        $this->rowKey = $rowKey;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowHeader(): bool
    {
        return $this->showHeader;
    }

    /**
     * @param bool $showHeader
     * @return Grid
     */
    public function setShowHeader(bool $showHeader): Grid
    {
        $this->showHeader = $showHeader;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowSorterTooltip(): bool
    {
        return $this->showSorterTooltip;
    }

    /**
     * @param bool $showSorterTooltip
     * @return Grid
     */
    public function setShowSorterTooltip(bool $showSorterTooltip): Grid
    {
        $this->showSorterTooltip = $showSorterTooltip;
        return $this;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     * @return Grid
     */
    public function setSize(string $size): Grid
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getSortDirections(): array
    {
        return $this->sortDirections;
    }

    /**
     * @param string[] $sortDirections
     * @return Grid
     */
    public function setSortDirections(array $sortDirections): Grid
    {
        $this->sortDirections = $sortDirections;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSticky(): bool
    {
        return $this->sticky;
    }

    /**
     * @param bool $sticky
     * @return Grid
     */
    public function setSticky(bool $sticky): Grid
    {
        $this->sticky = $sticky;
        return $this;
    }

    /**
     * @return null
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param null $summary
     * @return Grid
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
