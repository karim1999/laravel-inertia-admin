import React from "react";
import {usePagination, useTable, useFilters, useGlobalFilter, useAsyncDebounce, useSortBy} from "react-table";
import Pagination from "./Pagination";
import DefaultColumnFilter from "./Filters/DefaultColumnFilter";
import GlobalFilter from "./Filters/GlobalFilter";
import {Inertia} from "@inertiajs/inertia";
// A great library for fuzzy filtering/sorting items
import {Query} from "cogent-js/src";
import {generateJsonApiUrl} from "../../Helpers/url";
import {Table} from "antd";

export default function TableComponent({ columns, data, pageNum, pageData, links, options, path }) {
    const defaultColumn = React.useMemo(
        () => ({
            // Let's set up our default Filter UI
            Filter: DefaultColumnFilter,
        }),
        []
    )
    // Use the state and functions returned from useTable to build your UI
    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page, // Instead of using 'rows', we'll use page,
        // which has only the rows for the active page
        // The rest of these things are super handy, too ;)
        canPreviousPage,
        canNextPage,
        pageOptions,
        pageCount,
        gotoPage,
        nextPage,
        previousPage,
        setPageSize,
        rows,
        state: { sortBy, filters },
        visibleColumns,
    } = useTable(
        {
            columns,
            data,
            manualPagination: true,
            manualFilters: true,
            manualSortBy: true,
            pageCount: pageNum,
            defaultColumn, // Be sure to pass the defaultColumn option
            initialState: {...pageData},
        },
        useFilters, // useFilters!
        useGlobalFilter, // useGlobalFilter!
        useSortBy,
        usePagination,
    )
    React.useEffect(() => {
        console.log({filters})
        console.log({sortBy})

        let newLink= generateJsonApiUrl("users", filters, sortBy);
        let currentLink= window.location.href;
        console.log({newLink})
        console.log({currentLink})
        if(newLink !== currentLink){
            // Inertia.get(newLink);
        }

    }, [sortBy, filters])

    // Render the UI for your table
    return (
        <>
            <table {...getTableProps()}>
            <thead>
              {headerGroups.map(headerGroup => (
                  <tr {...headerGroup.getHeaderGroupProps()}>
                      {headerGroup.headers.map(column => (
                          <th {...column.getHeaderProps(column.getSortByToggleProps())}>
                              {column.render('Header')}
                              {/* Add a sort direction indicator */}
                              <span>
                                  {column.isSorted
                                      ? column.isSortedDesc
                                          ? ' 🔽'
                                          : ' 🔼'
                                      : ''}
                              </span>
                              {/* Render the columns filter UI */}
                              <div>{column.canFilter ? column.render('Filter') : null}</div>
                          </th>
                      ))}
                  </tr>
              ))}
              <tr>
          </tr>
            </thead>
            <tbody {...getTableBodyProps()}>
              {page.map((row, i) => {
                  prepareRow(row)
                  return (
                      <tr {...row.getRowProps()}>
                          {row.cells.map(cell => {
                              return <td {...cell.getCellProps()}>{cell.render('Cell')}</td>
                          })}
                      </tr>
                  )
              })}
            </tbody>
            </table>
            <Pagination links={links}/>
          </>
    )
}
