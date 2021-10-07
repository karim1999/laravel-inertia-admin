import { useState, useEffect } from 'react';
let JsonApiQueryParserClass = require('jsonapi-query-parser');
let JsonApiQueryParser = new JsonApiQueryParserClass();

export default function useRequestFilters(key) {
    let requestData= JsonApiQueryParser.parseRequest(window.location.href);
    const [filterData, setFilterData] = useState(key ? requestData.queryData.filter[key] || "" : requestData.queryData.filter);

    return filterData;
}
