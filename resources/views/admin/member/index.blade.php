<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>会員管理</title>
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="../favicon.ico">
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/js/vendors/calendar/calendar.css') }}" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
</head>

<body>
    <header id="main-header" class="main-header">
        <a href="../" class="main-header__logo">ポイント</a>
        <div class="main-header__user">
            <i class="fa-solid fa-user"></i>アカウント①
        </div>
        <nav class="main-header__navGlobal">
            <ul class="main-header__menu" role="list">
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>ポイントエネルギー</span></a></li>
                <li class="main-header__menu-item"><a href="" class="main-header__link"><span>お申し込み管理</span></a>
                </li>
                <li class="main-header__menu-item"><a href="/"
                        class="main-header__link is-active"><span>会員管理</span></a></li>
                <li class="main-header__menu-item"><a href="" class="main-header__link"><span>お問い合わせ管理</span></a>
                </li>
                <li class="main-header__menu-item"><a href="" class="main-header__link"><span>バナー管理</span></a>
                </li>
                <li class="main-header__menu-item"><a href="" class="main-header__link"><span>マスター管理</span></a>
                </li>
                <li class="main-header__menu-item"><a href="" class="main-header__link"><span>アカウント管理</span></a>
                </li>
                <li class="main-header__menu-item logout"><a href=""
                        class="main-header__link"><span>ログアウト</span></a></li>
            </ul>
        </nav>
    </header>
    <main id="page-member" class="wrapper">
        <div class="main-content">
            <h1 class="c-ttl__01">会員一覧</h1>
            <form action="" method="get">
                <div class="sort-block form-block sort-member">
                    <div class="sort-block__clmL">
                        <div class="sort-block__item">
                            <div class="sort-block__item-head">物件</div>
                            <input type="text" name="building_name">
                        </div>
                        <div class="sort-block__item">
                            <div class="sort-block__item-head">部屋No.</div>
                            <input type="text" name="room_number">
                        </div>
                        <div class="sort-block__item">
                            <div class="sort-block__item-head">エントリー氏名</div>
                            <div class="input-name">
                                <div class="clm">姓<input type="text" name="last_name" class="--s"></div>
                                <div class="clm">名<input type="text" name="first_name" class="--s"></div>
                            </div>
                        </div>
                        <div class="sort-block__item">
                            <div class="sort-block__item-head">契約会社</div>
                            <div class="c-selectBox">
                                <select>
                                    <option selected="" disabled="disabled">選択してください</option>
                                    <option value="FNJでんき＋東京ガス">FNJでんき＋東京ガス</option>
                                    <option value="FNJでんき＋FNJガス">FNJでんき＋FNJガス</option>
                                    <option value="まだ決めていない">まだ決めていない</option>
                                    <option value="選択肢にない">選択肢にない</option>
                                </select>
                            </div>
                        </div>
                        <div class="sort-block__item">
                            <div class="sort-block__item-head">状況</div>
                            <div class="c-selectBox">
                                <select>
                                    <option selected="" disabled="disabled">選択してください</option>
                                    <option value="でんき〇　ガス〇">でんき〇　ガス〇</option>
                                    <option value="でんき〇　ガス×">でんき〇　ガス×</option>
                                    <option value="でんき×　ガス×">でんき×　ガス×</option>
                                    <option value="空き">空き</option>
                                    <option value="参加終了">参加終了</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="sort-block__clmR">
                        <button class="c-btn"><i class="fa-solid fa-sliders"></i>絞り込み</button>
                        <input type="reset" class="c-btn --gy" value="クリア">
                    </div>
                </div>
            </form>
            <div class="table-block">
                <p class="table-block__total">1-100件（合計{{ $total }}件）</p>
                <div class="table-block__scroll">
                    <div class="table-sticky">
                        <table class="table-member c-table__02">
                            <tr class="c-table__02-row">
                                <th class="c-table__02-head">操作</th>
                                <th class="c-table__02-head">エントリー<br>No.</th>
                                <th class="c-table__02-head">最終更新日時</th>
                                <th class="c-table__02-head">物件</th>
                                <th class="c-table__02-head">部屋番号</th>
                                <th class="c-table__02-head">状況</th>
                                <th class="c-table__02-head">エントリー<br>氏名（姓）</th>
                                <th class="c-table__02-head">エントリー<br>氏名（名）</th>
                                <th class="c-table__02-head">生年月日</th>
                                <th class="c-table__02-head">居住人数</th>
                            </tr>
                            @foreach ($entries as $entry)
                                <tr>
                                    <td class="c-table__02-cont">
                                        <div class="btn-box">
                                            <a href="{{ route('entry.edit', ['id' => $entry->id]) }}"
                                                class="c-btn__02"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="file" class="c-btn__02"
                                                data-micromodal-trigger="modal-3">Point履歴</button>
                                        </div>
                                    </td>
                                    <td class="c-table__02-cont">{{ $entry->id }}</td>
                                    <td class="c-table__02-cont">{{ $entry->updated_at->format('Y-m-d H:i') }}</td>
                                    <td class="c-table__02-cont">{{ $entry->building->buildingNameJapanese }}</td>
                                    <td class="c-table__02-cont">{{ $entry->room->room_number }}</td>
                                    <td class="c-table__02-cont">空き</td>
                                    <td class="c-table__02-cont">{{ $entry->representative_lastname }}</td>
                                    <td class="c-table__02-cont">{{ $entry->representative_firstname }}</td>
                                    <td class="c-table__02-cont">
                                        {{ Carbon::parse($entry->representative_birthdate)->format('Y.m.d') }} </td>
                                    <td class="c-table__02-cont">{{ $entry->resident->residents_count }}人</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="ft-controls">
                <button class="c-btn --bl --m" id="download-csv"><i class="fa-solid fa-download"></i>ダウンロード</button>
            </div>
        </div>
        <div class="modal micromodal-slide" id="modal-3">
            <div class="modal__overlay" data-micromodal-close>
                <div class="modal__container">
                    <div role="document">
                        <header class="modal__header">
                            <h2 class="modal__title c-ttl__02">Point履歴</h2>
                            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>
                        <main class="modal__content point-history-cont">
                            <div class="select-year">
                                <div class="c-selectBox">
                                    <select class="js-select-yr">
                                        <option value="2023">2023年</option>
                                        <option value="2022">2022年</option>
                                        <option value="2021">2021年</option>
                                        <option value="2020">2020年</option>
                                    </select>
                                </div>
                                <span>の履歴</span>
                            </div>
                            <div class="c-scroll-box">
                                <div class="js-select-content" id="2023">
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2023/08/15</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">+180</span>point</div>
                                            <div class="updown">7月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                    </div>
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2023/08/10</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-500</span>point</div>
                                            <div class="updown">商品応募　5口</div>
                                            <div class="score">読売ジャイアンツくらしのサス活観戦ツアーへご招待</div>
                                        </div>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">+180</span>point</div>
                                            <div class="updown">7月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                    </div>
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2023/07/02</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-5000</span>point</div>
                                            <div class="updown">商品応募　1口</div>
                                            <div class="score">FC東京くらしのサス活Day(仮称)へご招待</div>
                                        </div>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">+88888</span>point</div>
                                            <div class="updown">7月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-select-content" id="2022">
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2022/12/15</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">+180</span>point</div>
                                            <div class="updown">12月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-5000</span>point</div>
                                            <div class="updown">商品応募　1口</div>
                                            <div class="score">FC東京くらしのサス活Day(仮称)へご招待</div>
                                        </div>
                                    </div>
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2022/011/10</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-500</span>point</div>
                                            <div class="updown">商品応募　5口</div>
                                            <div class="score">読売ジャイアンツくらしのサス活観戦ツアーへご招待</div>
                                        </div>
                                    </div>
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2022/06/22</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-5000</span>point</div>
                                            <div class="updown">商品応募　1口</div>
                                            <div class="score">FC東京くらしのサス活Day(仮称)へご招待</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-select-content" id="2021">
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2021/11/22</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">+8888</span>point</div>
                                            <div class="updown">11月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="js-select-content" id="2020">
                                    <div class="point-history">
                                        <h3 class="result-box__title c-ttl__04">2020/09/22</h3>
                                        <div class="point-history__item">
                                            <div class="point"><span class="num">-8888</span>point</div>
                                            <div class="updown">9月獲得ポイント付与</div>
                                            <div class="score">削減CO2　▼99t（実績 8888t/目標 8888t）</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="modal__footer">
                                <button class="c-btn --bl --m" data-micromodal-trigger="modal-2"><i
                                        class="fa-solid fa-download"></i>ダウンロード</button>
                            </footer>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('backend/js/vendors/calendar/calendar.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js"></script>
    <script src="{{ asset('backend/js/vendors/micromodal.min.js') }}"></script>
    <script src="{{ asset('backend/js/setting.js') }}"></script>

    <script>
        const queryString = window.location.search;
        const params = new URLSearchParams(queryString);
        const buildingName = params.get('building_name') ?? '';
        const roomNumber = params.get('room_number') ?? '';
        const lastName = params.get('last_name') ?? '';
        const firstName = params.get('first_name') ?? '';
        const queryParams = new URLSearchParams({
            building_name: buildingName,
            room_number: roomNumber,
            last_name: lastName,
            first_name: firstName
        });

        document.getElementById('download-csv').addEventListener('click', function() {
            fetch('{{ route('entry.download-csv') }}?' + queryParams, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'text/csv'
                    }
                })
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'data.csv';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Error downloading CSV:', error);
                });
        });
    </script>
</body>

</html>
