import React from 'react'
import TableComponent from "../Components/TableComponent";
import useRequestFilters from "../Components/TableComponent/Filters/useRequestFilters";
import AntdTableComponent from "../Components/AntdTable";
import { usePage } from '@inertiajs/inertia-react'

export default function List({records, grid}) {
    const columnFilters= useRequestFilters();

    const columns = React.useMemo(
        () => grid.columns,
        []
    )

    const columnFiltersArr= () => {
        // console.log({columnFilters})
        // return columnFilters.map(filter => ({key: filter.id, value: filter.value}))
        return [];
    }


    console.log({grid});
    const data = React.useMemo(() => records.data || records, [])

    return (
        <>
            <AntdTableComponent
                path={records.path}
                links={records.links}
                grid={grid}
                columns={columns}
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
