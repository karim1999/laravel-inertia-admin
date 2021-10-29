import React from 'react'
import TableComponent from "../Components/TableComponent";
import useRequestFilters from "../Components/TableComponent/Filters/useRequestFilters";
import AntdTableComponent from "../Components/AntdTable";
import { usePage } from '@inertiajs/inertia-react'
import {gridKeys} from "../Helpers/mappingSettings";

const mapColumns= (columns) => {
    return columns.map((column) => {
        return {
            ...column
        }
    });
}
const mapKey= async (item, mapArr, callback) => {
    for (let key of mapArr) {
        if(item[key]){
            let tempValue= item[key];
            item[key]= () => tempValue
        }
    }
    return item;
}
const mapGrid= async (grid) => {
    // await mapKey(grid, gridKeys.functions, (value, item) => value);
    grid.footer= () => "hi"
    // mapKey(grid, gridKeys.html,  (value) => <div dangerouslySetInnerHTML={{ __html: value }}></div>);
    console.log({grid})
    return {
        ...grid,
        columns: null, //We don't want the columns anymore
    };
}

export default function List({records, grid}) {
    const columnFilters= useRequestFilters();

    const mappedGrid = React.useMemo(
        () => mapGrid(grid),
        []
    )
    const mappedColumns = React.useMemo(
        () => mapColumns(grid.columns),
        []
    )

    const columnFiltersArr= () => {
        // console.log({columnFilters})
        // return columnFilters.map(filter => ({key: filter.id, value: filter.value}))
        return [];
    }

    const data = React.useMemo(() => records.data || records, [])
    return (
        <>
            <AntdTableComponent
                path={records.path}
                links={records.links}
                grid={mappedGrid}
                columns={mappedColumns}
                data={data}
                pageData={{pageIndex: records.current_page - 1, filters: columnFiltersArr()}}
                pageNum={records.last_page - 1}
                totalNum={records.total}
                currentPage={records.current_page}
                pageSize={records.per_page}
            />
        </>
    )
}
