<?php

namespace Karim\LaravelInertiaAdmin\Module\Grid;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

/**
 *
 */
class Column implements Arrayable, Jsonable, JsonSerializable
{
    //left | right | center
    /**
     * @var string
     */
    protected $align= "left";
    /**
     * @var string
     */
    protected $className= "";
    /**
     * @var int
     */
    protected $colSpan= 1;
    /**
     * @var string
     */
    protected $dataIndex= "";
    /**
     * @var array
     */
    protected $defaultFilteredValue= [];
    /**
     * @var string
     */
    protected $defaultSortOrder= "";
    /**
     * @var bool
     */
    protected $editable= false;
    /**
     * @var bool
     */
    protected $filterDropdownVisible= false;
    /**
     * @var bool
     */
    protected $filtered= false;
    /**
     * @var array
     */
    protected $filteredValue= [];
    /**
     * @var string
     */
    protected $filterIcon= "";
    /**
     * @var bool
     */
    protected $filterMultiple= false;
    //'menu' | 'tree'
    /**
     * @var string
     */
    protected $filterMode= "menu";
    /**
     * @var bool
     */
    protected $filterSearch= false;
    /**
     * @var array
     */
    protected $filters= [];
    //true(same as left) 'left' 'right'
    /**
     * @var mixed
     */
    protected $fixed= false;
    /**
     * @var bool
     */
    protected $showSorterTooltip= true;
    /**
     * @var string[]
     */
    protected $sortDirections= ["ascend", "descend"];
    /**
     * @var bool
     */
    protected $sorter= true;
    //'ascend' 'descend' false
    /**
     * @var mixed
     */
    protected $sortOrder= false;
    /**
     * @var string
     */
    protected $title= "";
    /**
     * @var null
     */
    protected $width= null;

    /**
     * @param string $dataIndex
     * @param string $title
     */
    public function __construct(string $dataIndex, string $title= "")
    {
        $this->dataIndex = $dataIndex;
        $this->title = $title ?? $dataIndex;
    }


    /**
     * @return string
     */
    public function getAlign(): string
    {
        return $this->align;
    }

    /**
     * @param string $align
     * @return Column
     */
    public function setAlign(string $align): Column
    {
        $this->align = $align;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string $className
     * @return Column
     */
    public function setClassName(string $className): Column
    {
        $this->className = $className;
        return $this;
    }

    /**
     * @return int
     */
    public function getColSpan(): int
    {
        return $this->colSpan;
    }

    /**
     * @param int $colSpan
     * @return Column
     */
    public function setColSpan(int $colSpan): Column
    {
        $this->colSpan = $colSpan;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataIndex(): string
    {
        return $this->dataIndex;
    }

    /**
     * @param string $dataIndex
     * @return Column
     */
    public function setDataIndex(string $dataIndex): Column
    {
        $this->dataIndex = $dataIndex;
        return $this;
    }

    /**
     * @return array
     */
    public function getDefaultFilteredValue(): array
    {
        return $this->defaultFilteredValue;
    }

    /**
     * @param array $defaultFilteredValue
     * @return Column
     */
    public function setDefaultFilteredValue(array $defaultFilteredValue): Column
    {
        $this->defaultFilteredValue = $defaultFilteredValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultSortOrder(): string
    {
        return $this->defaultSortOrder;
    }

    /**
     * @param string $defaultSortOrder
     * @return Column
     */
    public function setDefaultSortOrder(string $defaultSortOrder): Column
    {
        $this->defaultSortOrder = $defaultSortOrder;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     * @return Column
     */
    public function setEditable(bool $editable): Column
    {
        $this->editable = $editable;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterDropdownVisible(): bool
    {
        return $this->filterDropdownVisible;
    }

    /**
     * @param bool $filterDropdownVisible
     * @return Column
     */
    public function setFilterDropdownVisible(bool $filterDropdownVisible): Column
    {
        $this->filterDropdownVisible = $filterDropdownVisible;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFiltered(): bool
    {
        return $this->filtered;
    }

    /**
     * @param bool $filtered
     * @return Column
     */
    public function setFiltered(bool $filtered): Column
    {
        $this->filtered = $filtered;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilteredValue(): array
    {
        return $this->filteredValue;
    }

    /**
     * @param array $filteredValue
     * @return Column
     */
    public function setFilteredValue(array $filteredValue): Column
    {
        $this->filteredValue = $filteredValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilterIcon(): string
    {
        return $this->filterIcon;
    }

    /**
     * @param string $filterIcon
     * @return Column
     */
    public function setFilterIcon(string $filterIcon): Column
    {
        $this->filterIcon = $filterIcon;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterMultiple(): bool
    {
        return $this->filterMultiple;
    }

    /**
     * @param bool $filterMultiple
     * @return Column
     */
    public function setFilterMultiple(bool $filterMultiple): Column
    {
        $this->filterMultiple = $filterMultiple;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilterMode(): string
    {
        return $this->filterMode;
    }

    /**
     * @param string $filterMode
     * @return Column
     */
    public function setFilterMode(string $filterMode): Column
    {
        $this->filterMode = $filterMode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterSearch(): bool
    {
        return $this->filterSearch;
    }

    /**
     * @param bool $filterSearch
     * @return Column
     */
    public function setFilterSearch(bool $filterSearch): Column
    {
        $this->filterSearch = $filterSearch;
        return $this;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param array $filters
     * @return Column
     */
    public function setFilters(array $filters): Column
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFixed()
    {
        return $this->fixed;
    }

    /**
     * @param mixed $fixed
     * @return Column
     */
    public function setFixed($fixed)
    {
        $this->fixed = $fixed;
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
     * @return Column
     */
    public function setShowSorterTooltip(bool $showSorterTooltip): Column
    {
        $this->showSorterTooltip = $showSorterTooltip;
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
     * @return Column
     */
    public function setSortDirections(array $sortDirections): Column
    {
        $this->sortDirections = $sortDirections;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSorter(): bool
    {
        return $this->sorter;
    }

    /**
     * @param bool $sorter
     * @return Column
     */
    public function setSorter(bool $sorter): Column
    {
        $this->sorter = $sorter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param mixed $sortOrder
     * @return Column
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Column
     */
    public function setTitle(string $title): Column
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param null $width
     * @return Column
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
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
