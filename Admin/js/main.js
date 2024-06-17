$(document).ready(function() {
  function loadAllStatements() {
    $.ajax({
      url: './core/get_all_statements.php',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var tableBody = $('tbody');
        tableBody.empty();
        $.each(data, function(index, statement) {
          var statusOptions = '<option value="Новое"' + (statement.status === 'Новое' ? ' selected' : '') + '>Новое</option>';
          if (statement.status === 'Новое') {
            statusOptions += '<option value="В процессе">В процессе</option>' +
                             '<option value="Выполнено">Выполнено</option>' +
                             '<option value="Отменено">Отменено</option>';
          } else {
            statusOptions = '<option value="' + statement.status + '" selected>' + statement.status + '</option>';
          }
          var row = '<tr>' +
            '<td>' + statement.id + '</td>' +
            '<td>' + statement.full_name + '</td>' +
            '<td>' + statement.department + '</td>' +
            '<td>' + statement.category + '</td>' +
            '<td>' + statement.description + '</td>' +
            '<td class="status" data-id="' + statement.id + '">' +
              '<select' + (statement.status !== 'Новое' ? ' disabled' : '') + '>' + statusOptions + '</select>' +
            '</td>' +
            '</tr>';
          tableBody.append(row);
        });

        // Add change event to select elements
        $('td.status select').on('change', function() {
          var newStatus = $(this).val();
          var statementId = $(this).parent().data('id');
          updateStatus(statementId, newStatus);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  }

  function updateStatus(id, status) {
    $.ajax({
      url: './core/update_status.php',
      method: 'POST',
      data: { id: id, status: status },
      success: function(response) {
        loadAllStatements(); // Reload statements to reflect the change
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  }

  // Load all statements for the admin on page load
  loadAllStatements();
});