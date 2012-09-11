var quotesTickerTimer;

$(document).ready(function() {
	if ($('.quotesticker').length > 0)
	{
		getQuotesTicker();
		$('.quotesticker').marquee('quotesticker')
			.mouseover(function() {
				$(this).trigger('stop');
			})
			.mouseout(function() {
				$(this).trigger('start');
			});
		quotesTickerTimer = setInterval(getQuotesTicker, 20000); // 20 seconds.
	}

	// Login
	// TODO: label tidak bisa hilang kalau passwordnya dari fitur 'remembered password' browser.
	function toggleInLabel(el)
	{
		var $this = $(el);
		var pos = $this.position();
		var $label = $this.prev('label');

		if ($this.val() == '')
		{
			$label.css('top', pos.top)
				.css('left', pos.left)
				.css('display', 'block');
		}
		else
			$label.css('display', 'none');
	}

	$('#member-login, #member-pass, #search').focusin(function() {
		$(this).prev('label').css('display', 'none');
	})
	.focusout(function() {
		toggleInLabel(this);
	})
	.prev('label').click(function() {
		$(this).css('display', 'none').next(':input').focus();
	});

	$('#member-login-btn-link').click(function(e){
		e.preventDefault();
		e.stopPropagation();

		if ($('#login-box-over-btn').hasClass('over'))
		{
			$('#login-box-over-btn').removeClass('over');
			$('#login-box-over').css('left', '-3000px');
		}
		else
		{
			$('#login-box-over-btn').addClass('over');
			$('#login-box-over').css('left', '-130px');
			toggleInLabel($('#member-login'));
			toggleInLabel($('#member-pass'));
			$('#member-login').focus();
		}
	});
	$('#login-box-over').click(function(e) {
		e.stopPropagation();
	});

	$('body').click(function() {
		$('#login-box-over-btn').removeClass('over');
		$('#login-box-over').css('left', '-3000px');
	});

	toggleInLabel($('#search'));

	$('#icon_livechat, #link_livechat, #sidebar_livechat, .livechat').click(function(e) {
		newwindow = window.open(baseUrl + 'chat/index','livechatwindow','width=586,height=654');
		if (window.focus) {newwindow.focus()}
		e.preventDefault();
	});

	$('#menu-tradinggame, .tradinggame').click(function(e) {
		newwindow = window.open(baseUrl + 'index/trading-game','tradinggamewindow','width=600,height=400');
		e.preventDefault();
	});

	$('.client-sidebar-smartreview-item').click(function() {
		$('.client-sidebar-smartreview-item.active').removeClass('active');
		$(this).addClass('active');
	});
});

function formatCurrency(el) {
	value = $(el).val();
	value = value.replace(/\,/g,"");
	$(el).val(digit_grouping(value));
};

function digit_grouping(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function getQuotesTicker()
{
	var newDate = new Date;
	$.ajax({
		url: baseUrl + 'data/quotes.json?ticker' + newDate.getTime(),
		async: true,
		dataType: 'json',
		success: function(data, textStatus, XMLHttpRequest) {
			if (textStatus == 'success')
			{
				imageUp = baseUrl + 'images/quotes_up.gif';
				imageDown = baseUrl + 'images/quotes_down.gif';

				$quotesEl = $('.quotesticker > div');
				if ($quotesEl.length == 0)
					$quotesEl = $('.quotesticker');

				$.each(data, function(index, value) {
					elName = 'quotesticker-' + value.symbol;
					if ($('#' + elName).length == 0)
					{
						$quotesEl.append('<span id="' + elName + '" class="quote ' + value.status + '"></span>');

						elName = '#' + elName;
						imageSrc = value.status == 'up' ? imageUp : imageDown;
						$(elName).append('<img src="' + imageSrc + '" alt="' + value.status + '" title="' + value.status + '"/>');
						$(elName).append('<span class="symbol">' + value.title + ' :</span>');
						$(elName).append('<span class="bid">' + value.bid + '</span>');
						$(elName).append('<span class="quotesdiv">&nbsp;</span>')
						$(elName).append('<span class="ask">' + value.ask + '</span>');
					}
					else
					{
						elName = '#' + elName;
						$(elName).removeClass().addClass('quote').addClass(value.status);
						imageSrc = value.status == 'up' ? imageUp : imageDown;
						$(elName + ' img').attr('src', imageSrc)
							.attr('alt', value.status)
							.attr('title', value.status);
						$(elName + ' .symbol').html(value.title + ' :');
						$(elName + ' .bid').html(value.bid);
						$(elName + ' .ask').html(value.ask);
					}
				});
			}
		}
	});
}