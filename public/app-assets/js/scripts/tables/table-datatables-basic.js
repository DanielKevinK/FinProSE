/**
 * DataTables Basic
 */

$(function () {
  'use strict';

  var dt_basic_table = $('.datatables-basic'),
    dt_table_category = $('.datatables-basic-category'),
    dt_table_investment = $('.datatables-basic-investment'),
    dt_table = $('.datatables-basic-user')

  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path');
  }

  // DataTable with buttons
  // --------------------------------------------------------------------

  if (dt_basic_table.length) {
    var dt_basic = dt_basic_table.DataTable({
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "image" },
            { data: "description" },
            { data: "category" },
            { data: "price" },
            { data: "stock" },
            { data: "actions" },
        ],
        columnDefs: [
            {
                // Actions
                targets: -1,
                title: "Actions",
                orderable: false,
                render: function (data, type, full, meta) {
                    var id = full["id"];
                    var tempElement = document.createElement("div");
                    tempElement.innerHTML = id;

                    // Use DOM manipulation to extract the desired content
                    var numberElement = tempElement.querySelector("strong"); // Select the <strong> element
                    var number = numberElement.textContent;              
                    return (
                        '<div class="d-inline-flex">' +
                        '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                        feather.icons["more-vertical"].toSvg({
                            class: "font-small-4",
                        }) +
                        "</a>" +
                        '<div class="dropdown-menu dropdown-menu-end">' +
                        '<a data-bs-toggle="modal" data-bs-target="#modals-edit-'+number+ '" href="javascript:;" class="dropdown-item">' +
                        feather.icons["file-text"].toSvg({
                            class: "font-small-4 me-50",
                        }) +
                        "Update</a>" +
                        '<a href="/home/product-delete/' +
                        number +
                        '" class="dropdown-item">' +
                        feather.icons["archive"].toSvg({
                            class: "font-small-4 me-50",
                        }) +
                        "Delete</a>" +
                        "</div>" +
                        "</div>" +
                        '<a href="javascript:;" class="item-edit">' +
                        feather.icons["edit"].toSvg({ class: "font-small-4" }) +
                        "</a>"
                    );
                },
            },
        ],
        order: [[2, "desc"]],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 5,
        lengthMenu: [5, 10, 25, 50, 75, 100],
        buttons: [
            {
                text:
                    feather.icons["plus"].toSvg({
                        class: "me-50 font-small-4",
                    }) + "Add New Record",
                className: "create-new btn btn-primary",
                attr: {
                    "data-bs-toggle": "modal",
                    "data-bs-target": "#modals-slide-in",
                },
                init: function (api, node, config) {
                    $(node).removeClass("btn-secondary");
                },
            },
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return "Details of " + data["full_name"];
                    },
                }),
                type: "column",
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                                  col.rowIdx +
                                  '" data-dt-column="' +
                                  col.columnIndex +
                                  '">' +
                                  "<td>" +
                                  col.title +
                                  ":" +
                                  "</td> " +
                                  "<td>" +
                                  col.data +
                                  "</td>" +
                                  "</tr>"
                            : "";
                    }).join("");

                    return data
                        ? $('<table class="table"/>').append(
                              "<tbody>" + data + "</tbody>"
                          )
                        : false;
                },
            },
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: "&nbsp;",
                next: "&nbsp;",
            },
        },
    });
    $('div.head-label').html('<h6 class="mb-0">Product List</h6>');
  }
  
  if (dt_table_category.length) {
      var dt_basic = dt_table_category.DataTable({
          columns: [
              { data: "id" },
              { data: "name" },
              { data: "link" },
              { data: "image" },
              { data: "actions" },
          ],
          columnDefs: [
              {
                  // Actions
                  targets: -1,
                  title: "Actions",
                  orderable: false,
                  render: function (data, type, full, meta) {
                      var id = full["id"];
                      var tempElement = document.createElement("div");
                      tempElement.innerHTML = id;

                      // Use DOM manipulation to extract the desired content
                      var numberElement = tempElement.querySelector("strong"); // Select the <strong> element
                      var number = numberElement.textContent;
                      return (
                          '<div class="d-inline-flex">' +
                          '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                          feather.icons["more-vertical"].toSvg({
                              class: "font-small-4",
                          }) +
                          "</a>" +
                          '<div class="dropdown-menu dropdown-menu-end">' +
                          '<a data-bs-toggle="modal" data-bs-target="#modals-edit-' +
                          number +
                          '" href="javascript:;" class="dropdown-item">' +
                          feather.icons["file-text"].toSvg({
                              class: "font-small-4 me-50",
                          }) +
                          "Update</a>" +
                          '<a href="/home/category-delete/' +
                          number +
                          '" class="dropdown-item">' +
                          feather.icons["archive"].toSvg({
                              class: "font-small-4 me-50",
                          }) +
                          "Delete</a>" +
                          "</div>" +
                          "</div>" +
                          '<a href="javascript:;" class="item-edit">' +
                          feather.icons["edit"].toSvg({
                              class: "font-small-4",
                          }) +
                          "</a>"
                      );
                  },
              },
          ],
          order: [[0, "asc"]],
          dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 5,
          lengthMenu: [5, 10, 25, 50, 75, 100],
          buttons: [
              {
                  text:
                      feather.icons["plus"].toSvg({
                          class: "me-50 font-small-4",
                      }) + "Add New Record",
                  className: "create-new btn btn-primary",
                  attr: {
                      "data-bs-toggle": "modal",
                      "data-bs-target": "#modals-slide-in",
                  },
                  init: function (api, node, config) {
                      $(node).removeClass("btn-secondary");
                  },
              },
          ],
          language: {
              paginate: {
                  // remove previous & next text from pagination
                  previous: "&nbsp;",
                  next: "&nbsp;",
              },
          },
      });
      $("div.head-label").html('<h6 class="mb-0">Category List</h6>');
  }

  if (dt_table_investment.length) {
      var dt_basic = dt_table_investment.DataTable({
          columns: [
              { data: "id" },
              { data: "investor" },
              { data: "product" },
              { data: "commission" },
              { data: "Income" },
              { data: "actions" },
          ],
          columnDefs: [
              {
                  // Actions
                  targets: -1,
                  title: "Actions",
                  orderable: false,
                  render: function (data, type, full, meta) {
                      var id = full["id"];
                      var tempElement = document.createElement("div");
                      tempElement.innerHTML = id;

                      // Use DOM manipulation to extract the desired content
                      var numberElement = tempElement.querySelector("strong"); // Select the <strong> element
                      var number = numberElement.textContent;
                      return (
                          '<div class="d-inline-flex">' +
                          '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                          feather.icons["more-vertical"].toSvg({
                              class: "font-small-4",
                          }) +
                          "</a>" +
                          '<div class="dropdown-menu dropdown-menu-end">' +
                          '<a data-bs-toggle="modal" data-bs-target="#modals-edit-' +
                          number +
                          '" href="javascript:;" class="dropdown-item">' +
                          feather.icons["file-text"].toSvg({
                              class: "font-small-4 me-50",
                          }) +
                          "Update</a>" +
                          "</div>" +
                          "</div>" +
                          '<a href="javascript:;" class="item-edit">' +
                          feather.icons["edit"].toSvg({
                              class: "font-small-4",
                          }) +
                          "</a>"
                      );
                  },
              },
          ],
          order: [[0, "asc"]],
          dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
          displayLength: 5,
          lengthMenu: [5, 10, 25, 50, 75, 100],
          buttons: [
              {
                  text:
                      feather.icons["plus"].toSvg({
                          class: "me-50 font-small-4",
                      }) + "Add New Record",
                  className: "create-new btn btn-primary",
                  attr: {
                      "data-bs-toggle": "modal",
                      "data-bs-target": "#modals-slide-in",
                  },
                  init: function (api, node, config) {
                      $(node).removeClass("btn-secondary");
                  },
              },
          ],
          responsive: {
              details: {
                  display: $.fn.dataTable.Responsive.display.modal({
                      header: function (row) {
                          var data = row.data();
                          return "Details of " + data["full_name"];
                      },
                  }),
                  type: "column",
                  renderer: function (api, rowIdx, columns) {
                      var data = $.map(columns, function (col, i) {
                          return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                              ? '<tr data-dt-row="' +
                                    col.rowIdx +
                                    '" data-dt-column="' +
                                    col.columnIndex +
                                    '">' +
                                    "<td>" +
                                    col.title +
                                    ":" +
                                    "</td> " +
                                    "<td>" +
                                    col.data +
                                    "</td>" +
                                    "</tr>"
                              : "";
                      }).join("");

                      return data
                          ? $('<table class="table"/>').append(
                                "<tbody>" + data + "</tbody>"
                            )
                          : false;
                  },
              },
          },
          language: {
              paginate: {
                  // remove previous & next text from pagination
                  previous: "&nbsp;",
                  next: "&nbsp;",
              },
          },
      });
      $("div.head-label").html('<h6 class="mb-0">Investor List</h6>');
  }

  if (dt_table.length) {
    var dt_basic = dt_table.DataTable({
        columns: [
            { data: "id" },
            { data: "name" },
            { data: "username" },
            { data: "email" },
            { data: "role" },
            { data: "actions" },
        ],
        columnDefs: [
            {
                // Actions
                targets: -1,
                title: "Actions",
                orderable: false,
                render: function (data, type, full, meta) {
                    var id = full["id"];
                    var tempElement = document.createElement("div");
                    tempElement.innerHTML = id;

                    // Use DOM manipulation to extract the desired content
                    var numberElement = tempElement.querySelector("strong"); // Select the <strong> element
                    var number = numberElement.textContent;
                    return (
                        '<div class="d-inline-flex">' +
                        '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                        feather.icons["more-vertical"].toSvg({
                            class: "font-small-4",
                        }) +
                        "</a>" +
                        '<div class="dropdown-menu dropdown-menu-end">' +
                        '<a data-bs-toggle="modal" data-bs-target="#modals-edit-' +
                        number +
                        '" href="javascript:;" class="dropdown-item">' +
                        feather.icons["file-text"].toSvg({
                            class: "font-small-4 me-50",
                        }) +
                        "Update</a>" +
                        '<a href="/home/user-delete/' +
                        number +
                        '" class="dropdown-item">' +
                        feather.icons["archive"].toSvg({
                            class: "font-small-4 me-50",
                        }) +
                        "Delete</a>" +
                        "</div>" +
                        "</div>" +
                        '<a href="javascript:;" class="item-edit">' +
                        feather.icons["edit"].toSvg({ class: "font-small-4" }) +
                        "</a>"
                    );
                },
            },
        ],
        order: [[2, "desc"]],
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        displayLength: 5,
        lengthMenu: [5, 10, 25, 50, 75, 100],
        buttons: [
            {
                text:
                    feather.icons["plus"].toSvg({
                        class: "me-50 font-small-4",
                    }) + "Add New Record",
                className: "create-new btn btn-primary",
                attr: {
                    "data-bs-toggle": "modal",
                    "data-bs-target": "#modals-slide-in",
                },
                init: function (api, node, config) {
                    $(node).removeClass("btn-secondary");
                },
            },
        ],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return "Details of " + data["full_name"];
                    },
                }),
                type: "column",
                renderer: function (api, rowIdx, columns) {
                    var data = $.map(columns, function (col, i) {
                        return col.title !== "" // ? Do not show row in modal popup if title is blank (for check box)
                            ? '<tr data-dt-row="' +
                                  col.rowIdx +
                                  '" data-dt-column="' +
                                  col.columnIndex +
                                  '">' +
                                  "<td>" +
                                  col.title +
                                  ":" +
                                  "</td> " +
                                  "<td>" +
                                  col.data +
                                  "</td>" +
                                  "</tr>"
                            : "";
                    }).join("");

                    return data
                        ? $('<table class="table"/>').append(
                              "<tbody>" + data + "</tbody>"
                          )
                        : false;
                },
            },
        },
        language: {
            paginate: {
                // remove previous & next text from pagination
                previous: "&nbsp;",
                next: "&nbsp;",
            },
        },
    });
    $('div.head-label').html('<h6 class="mb-0">User List</h6>');
  }

  // Add New record
  // ? Remove/Update this code as per your requirements ?
  var count = 101;
  $('.data-submit').on('click', function () {
    var $new_name = $('.add-new-record .dt-full-name').val(),
      $new_post = $('.add-new-record .dt-post').val(),
      $new_email = $('.add-new-record .dt-email').val(),
      $new_date = $('.add-new-record .dt-date').val(),
      $new_salary = $('.add-new-record .dt-salary').val();

    if ($new_name != '') {
      dt_basic.row
        .add({
          responsive_id: null,
          id: count,
          full_name: $new_name,
          post: $new_post,
          email: $new_email,
          start_date: $new_date,
          salary: '$' + $new_salary,
          status: 5
        })
        .draw();
      count++;
      $('.modal').modal('hide');
    }
  });

  // Delete Record
  $('.datatables-basic tbody').on('click', '.delete-record', function () {
    dt_basic.row($(this).parents('tr')).remove().draw();
  });
});
