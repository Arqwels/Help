$(document).ready(function() {
  function loadStatements() {
    $.ajax({
      url: './core/get_statements.php',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var tableBody = $('tbody');
        tableBody.empty();
        $.each(data, function(index, statement) {
          var row = '<tr>' +
            '<td>' + statement.id + '</td>' +
            '<td>' + statement.category + '</td>' +
            '<td>' + statement.description + '</td>' +
            '<td>' + statement.status + '</td>' +
            '</tr>';
          tableBody.append(row);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error: ' + textStatus + ' - ' + errorThrown);
      }
    });
  }

  loadStatements();
});