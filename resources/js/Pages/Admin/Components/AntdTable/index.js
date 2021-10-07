import React, {useState} from "react";
import {Inertia} from "@inertiajs/inertia";
import {Table} from "antd";


export default function AntdTableComponent({ columns, data, pageNum, pageData, links, options, path, totalNum, currentPage, pageSize }) {
    const [selectedRowKeys, setSelectedRowKeys]= useState([]);
    const tableColumns = React.useMemo(() => {
        let finalColumns= [];
        columns.forEach(column => {
            // if(column.sorter){
            //     column.sorter= (a, b) => {
            //         Inertia.get(path, {sort_by: column.dataIndex, sort_type: ""});
            //     }
            // }
            finalColumns.push({
                ...column,
            })
        })
        finalColumns.push({
            title: 'Action',
            key: 'operation',
            fixed: 'right',
            width: 100,
            render: () => <a>action</a>,
        })

        console.log(finalColumns)
        return finalColumns;
    },[])

    const onSelectChange = selectedRowKeys => {
        console.log('selectedRowKeys changed: ', selectedRowKeys);
        setSelectedRowKeys(selectedRowKeys);
    };

    const onChangePagination = (page, pageSize) => {
        // Inertia.get(path, {page, limit: pageSize}, { preserveScroll: true });
    };
    const onChange = (pagination, filters, sorter) => {
        console.log('Various parameters', pagination, filters, sorter);
        Inertia.get(path, {
            page: pagination.current,
            limit: pagination.pageSize,
            sort_by: sorter?.field,
            sort_type: sorter?.order || null,
        }, { preserveScroll: true });
    };

    // Render the UI for your table
    return (
        <div>
            <Table
                pagination={{pageSize: pageSize, onChange: onChangePagination, total: totalNum, current: currentPage}}
                rowKey={options?.key || "id"}
                columns={tableColumns}
                dataSource={data}
                onChange={onChange}
                rowSelection={{
                    selectedRowKeys,
                    onChange: onSelectChange,
                }}
            />
        </div>
    )
}
