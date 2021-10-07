import React from 'react'
import TableComponent from "../Components/TableComponent";
import useRequestFilters from "../Components/TableComponent/Filters/useRequestFilters";
import AntdTableComponent from "../Components/AntdTable";
import { usePage } from '@inertiajs/inertia-react'

export default function List({records, headers, options}) {
    const columnFilters= useRequestFilters();

    const columns = React.useMemo(
        () => headers,
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
                options={options}
                links={records.links}
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
