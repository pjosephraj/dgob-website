/* globals WGo: false */
$(function () {

	var player = new WGo.BasicPlayer($('#e404-board').get(0), {
		board: {
			stoneHandler: WGo.Board.drawHandlers.NORMAL,
			background: '/wp-content/plugins/go-baduk-weiqi/img/wood1.jpg',
			section: {
				left: 0,
				bottom: 5,
				top: 5,
				right: 0
			}
		},
		sgf: '(;GM[1]FF[4]CA[UTF-8]AP[CGoban:3]ST[2]RU[Japanese]SZ[19]KM[0.00]PW[Weiß]PB[Schwarz];B[dk];W[jj];B[qj];W[dj];B[ej];W[pj];B[pk];W[oj];B[qi];W[jm];B[ok];W[jg];B[nj];W[di];B[ei];W[pi];B[ph];W[lj];B[eg];W[hj];B[el];W[hl];B[em];W[lh];B[qg];W[cj];B[bj];W[hh];B[dh];W[ll];B[qm];W[ik];B[ql];W[ki];B[ck];W[im];B[nk];W[km];B[ek];W[ig];B[bk];W[kg];B[qk];W[lk];B[oi];W[hi];B[rk];W[hk];B[eh];W[li];B[ci];W[il];B[fk];W[kh];B[qh])))',
		move: 0,
		layout: {
			left: null,
			bottom: null,
			top: null,
			right: null
		}
	});

	var numMoves = 55;
	var autoplay = setInterval(function () {
		if (numMoves > 0) {
			numMoves -= 1;
			player.next();
		} else {
			clearInterval(autoplay);
		}
	}, 50);

});