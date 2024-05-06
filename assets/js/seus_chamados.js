var viewPreference = localStorage.getItem('viewPreference');
    if (viewPreference === 'tableView') {
        showTableView();
    }

    function toggleView() {
        var cardView = document.getElementById('cardView');
        var tableView = document.getElementById('tableView');

        if (cardView.style.display === 'none') {
            showCardView();
        } else {
            showTableView();
        }
    }

    function showCardView() {
        var cardView = document.getElementById('cardView');
        var tableView = document.getElementById('tableView');

        cardView.style.display = 'block';
        tableView.style.display = 'none';

        // Salva a preferência de visualização no localStorage
        localStorage.setItem('viewPreference', 'cardView');
    }

    function showTableView() {
        var cardView = document.getElementById('cardView');
        var tableView = document.getElementById('tableView');

        cardView.style.display = 'none';
        tableView.style.display = 'block';

        // Salva a preferência de visualização no localStorage
        localStorage.setItem('viewPreference', 'tableView');
    }