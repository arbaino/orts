        $(function() {

            $("#jsGrid").jsGrid({
                height: "100%",
                width: "100%",
                filtering: false,
                editing: true,
                inserting: true,
                sorting: true,
                paging: true,
                autoload: true,
                pageSize: 15,
                pageButtonCount: 5,
                deleteConfirm: "Do you really want to delete the client?",
                controller: db,
                fields: [
                    { name: "List", type: "text", width: 150 },
                    { name: "Price", type: "number", width: 50 },
                    // { name: "Address", type: "text", width: 200 },
                    // { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    // { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                    { type: "control" }
                ]
            });

        });