// Define a default UI for filtering
import React, {useState} from "react";
import {useAsyncDebounce} from "react-table";
import {Inertia} from "@inertiajs/inertia";
import {Query} from "cogent-js/src";
import useRequestFilters from "../useRequestFilters";
import {generateJsonApiUrl} from "../../../../Helpers/url";

export default function DefaultColumnFilter({column: { filterValue, preFilteredRows, setFilter, id }}) {
    const columnFilters= useRequestFilters();
    const columnFilter= useRequestFilters(id);
    const [value, setValue] = useState(columnFilter)
    const count = preFilteredRows?.length

    const onChange = useAsyncDebounce(value => {
        setFilter(value || undefined)
        // Inertia.get(generateJsonApiUrl("users",{...columnFilters, [id]: value || ""}));

    }, 300)

    return (
        <input
            value={value || ""}
            onChange={e => {
                setValue(e.target.value);
                onChange(e.target.value);
            }}
            placeholder={`Search ${count} records...`}
        />
    )
}
