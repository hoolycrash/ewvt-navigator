<!-- 
Dieses Easteregg wird bei dem Suchbegriff "TicTacToe" am unteren Seitenende ausgegeben
Es ist ein kleines TicTacToe Spiel.
 -->

<!-- Spielfeld -->
<div class="board" onclick="play(event)">
	<div class="row">
		<span class="cell" data-index="0">⬜</span>
		<span class="cell" data-index="1">⬜</span>
		<span class="cell" data-index="2">⬜</span>
	</div>
	<div class="row">
		<span class="cell" data-index="3">⬜</span>
		<span class="cell" data-index="4">⬜</span>
		<span class="cell" data-index="5">⬜</span>
	</div>
	<div class="row">
		<span class="cell" data-index="6">⬜</span>
		<span class="cell" data-index="7">⬜</span>
		<span class="cell" data-index="8">⬜</span>
	</div>
</div>

<script>
  let currentPlayer = '⭕';
  const board = ['','','','','','','','',''];

  function play(event) {
    const cell = event.target;
    const index = cell.dataset.index;

    if (board[index] === '') {
      cell.textContent = currentPlayer;
      board[index] = currentPlayer;
      checkWinner();
      currentPlayer = currentPlayer === '⭕' ? '❌' : '⭕';
    }
  }

  function checkWinner() {
    const winConditions = [ // Mögliche Feldbelegungen zu gewinnen 
      [0, 1, 2], [3, 4, 5], [6, 7, 8], // Horizontal
      [0, 3, 6], [1, 4, 7], [2, 5, 8], // Vertikal
      [0, 4, 8], [2, 4, 6]             // Schreg
    ];

    for (const condition of winConditions) {
      const [a, b, c] = condition;
      if (board[a] !== '' && board[a] === board[b] && board[a] === board[c]) {
        alert(`Spieler ${board[a]} hat gewonnen!`); // Popup mit Gewinner
        resetBoard();
        return;
      }
    }

    if (!board.includes('')) {
      alert("Unentschieden");
      resetBoard();
    }
  }

  function resetBoard() {
    const cells = document.querySelectorAll('.cell');
    cells.forEach(cell => {
      cell.textContent = '⬜';
    });
    board.fill('');
    currentPlayer = '⭕';
  }
</script>