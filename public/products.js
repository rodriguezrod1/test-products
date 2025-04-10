$(document).ready(function () {
  let currentSortField = "name";
  let currentSortOrder = "asc";
  let currentSearch = "";

  function loadProducts() {
    $.ajax({
      url: "/products",
      type: "GET",
      data: {
        search: currentSearch,
        sort_field: currentSortField,
        sort_order: currentSortOrder,
        ajax: true,
      },
      success: function (response) {
        let tbody = $("#products-table tbody");
        tbody.empty();

        response.data.forEach(function (product) {
          tbody.append(`
                        <tr>
                            <td>${product.name}</td>
                            <td>$${product.price.toFixed(2)}</td>
                            <td>${product.stock}</td>
                        </tr>
                    `);
        });

        // Actualizar paginación
        updatePaginationLinks(response);
      },
    });
  }

  function updatePaginationLinks(response) {
    let pagination = $("#pagination-links");
    pagination.empty();

    if (response.prev_page_url) {
      pagination.append(
        `<a href="${response.prev_page_url}" class="page-link">Previous</a>`
      );
    }

    if (response.next_page_url) {
      pagination.append(
        `<a href="${response.next_page_url}" class="page-link">Next</a>`
      );
    }
  }

  // Búsqueda en tiempo real
  $("#search").on("keyup", function () {
    currentSearch = $(this).val();
    loadProducts();
  });

  // Ordenamiento
  $(".sort-link").on("click", function (e) {
    e.preventDefault();
    let sortField = $(this).data("sort");

    if (sortField === currentSortField) {
      currentSortOrder = currentSortOrder === "asc" ? "desc" : "asc";
    } else {
      currentSortField = sortField;
      currentSortOrder = "asc";
    }

    loadProducts();
  });

  // Carga inicial
  loadProducts();
});
