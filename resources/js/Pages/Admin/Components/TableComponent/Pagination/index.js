import {Inertia} from "@inertiajs/inertia";

export default function Pagination({links}){
    return (
        <div className="pagination">
            {links.map((link, index) => {
                return <button dangerouslySetInnerHTML={{ __html: link.label }} key={index} onClick={() => Inertia.get(link.url)} disabled={!link.url}>
                </button>;
            })}
        </div>
    )
}
