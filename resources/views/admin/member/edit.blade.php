<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>会員管理 編集</title>
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="../../favicon.ico">
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/js/vendors/calendar/calendar.css') }}" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
</head>

<body>
    <header id="main-header" class="main-header">
        <a href="../../" class="main-header__logo">ポイント</a>
        <div class="main-header__user">
            <i class="fa-solid fa-user"></i>アカウント①
        </div>
        <nav class="main-header__navGlobal">
            <ul class="main-header__menu" role="list">
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>ポイントエネルギー</span></a></li>
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>お申し込み管理</span></a></li>
                <li class="main-header__menu-item"><a href="{{ route('entry.index') }}"
                        class="main-header__link"><span>会員管理</span></a></li>
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>お問い合わせ管理</span></a></li>
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>バナー管理</span></a></li>
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>マスター管理</span></a></li>
                <li class="main-header__menu-item"><a href=""
                        class="main-header__link"><span>アカウント管理</span></a></li>
                <li class="main-header__menu-item logout"><a href=""
                        class="main-header__link"><span>ログアウト</span></a></li>
            </ul>
        </nav>
    </header>
    <main id="page-member_form" class="wrapper">
        <div class="main-content">
            <h1 class="c-ttl__01">会員情報編集</h1>
            <div class="form-wrap">
                <form>
                    <div class="form-block">
                        <div class="form-block__item">
                            <div class="form-block__head">エントリーNo.</div>
                            <div class="form-block__cont">{{ $entry->id }}</div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">物件</div>
                            <div class="form-block__cont">
                                <div class="c-selectBox --s">
                                    <select>
                                        <option selected="" value="{{ $entry->building->buildingNameJapanese }}">
                                            {{ $entry->building->buildingNameJapanese }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">部屋番号</div>
                            <div class="form-block__cont">
                                <input type="text" name="" class="--ss"
                                    value="{{ $entry->room->room_number }}">
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">状況</div>
                            <div class="form-block__cont">
                                <div class="checkbox-row">
                                    <label class="c-checkBox">
                                        <input type="radio" name="b" checked="">
                                        <span>空き</span>
                                    </label>
                                    <label class="c-checkBox">
                                        <input type="radio" name="b">
                                        <span>でんき：〇、ガス：〇</span>
                                    </label>
                                    <label class="c-checkBox">
                                        <input type="radio" name="b">
                                        <span>でんき：〇、ガス：×</span>
                                    </label>
                                    <label class="c-checkBox">
                                        <input type="radio" name="b">
                                        <span>でんき:×、ガス：×</span>
                                    </label>
                                    <label class="c-checkBox">
                                        <input type="radio" name="b">
                                        <span>参加終了</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">エントリー氏名</div>
                            <div class="form-block__cont">
                                <div class="input-name">
                                    <span>姓</span><input type="text" name=""
                                        value="{{ $entry->representative_lastname }}">
                                    <span>名</span><input type="text" name=""
                                        value="{{ $entry->representative_firstname }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">生年月日</div>
                            <div class="form-block__cont">
                                <div class="input-birth">
                                    <div class="c-selectBox">
                                        <select name="year">
                                            @php
                                                $currentYear = date('Y');
                                                $startYear = 1900;
                                                $birthDate = Carbon::parse($entry->representative_birthdate)->year;
                                            @endphp

                                            @for ($year = $currentYear; $year >= $startYear; $year--)
                                                <option
                                                    value="{{ $year }}"{{ $birthDate == $year ? ' selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span>年</span>
                                    <div class="c-selectBox">
                                        <select name="month">
                                            @php
                                                $birthDate = Carbon::parse($entry->representative_birthdate)->month;
                                        @endphp

                                            @for ($month = 1; $month <= 12; $month++)
                                                <option
                                                    value="{{ $month }}"{{ $birthDate == $month ? ' selected' : '' }}>
                                                    {{ $month }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span>月</span>
                                    <div class="c-selectBox">
                                        <select name="day">
                                            @php
                                                $birthDate = Carbon::parse($entry->representative_birthdate)->day;
                                        @endphp

                                            @for ($day = 1; $day <= 31; $day++)
                                                <option
                                                    value="{{ $day }}"{{ $birthDate == $day ? ' selected' : '' }}>
                                                    {{ $day }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span>日</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head val-t">居住人数</div>
                            <div class="form-block__cont">
                                <div class="input-numbers">
                                    <div class="input-numbers__item">
                                        <span>成人</span><input type="text" name=""
                                            value="{{ $entry->resident->residents_count }}"><span>人</span>
                                    </div>
                                    <div class="input-numbers__item">
                                        <span>子供</span><input type="text" name=""
                                            value="{{ $entry->childResident->child_residents_count }}"><span>人</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head val-t">賞品配送先</div>
                            <div class="form-block__cont">
                                <div class="input-address">
                                    <div class="input-address__item">
                                        <span>〒</span>
                                        <input type="text" name="" value="{{ $entry->delivery_zip }}">
                                        <div class="c-selectBox">
                                            <select name="pref">
                                                <option value="北海道">北海道</option>
                                                <option value="青森県">青森県</option>
                                                <option value="岩手県">岩手県</option>
                                                <option value="宮城県">宮城県</option>
                                                <option value="秋田県">秋田県</option>
                                                <option value="山形県">山形県</option>
                                                <option value="福島県">福島県</option>
                                                <option value="茨城県">茨城県</option>
                                                <option value="栃木県">栃木県</option>
                                                <option value="群馬県">群馬県</option>
                                                <option value="埼玉県">埼玉県</option>
                                                <option value="千葉県">千葉県</option>
                                                <option value="東京都" selected="selected">東京都</option>
                                                <option value="神奈川県">神奈川県</option>
                                                <option value="新潟県">新潟県</option>
                                                <option value="富山県">富山県</option>
                                                <option value="石川県">石川県</option>
                                                <option value="福井県">福井県</option>
                                                <option value="山梨県">山梨県</option>
                                                <option value="長野県">長野県</option>
                                                <option value="岐阜県">岐阜県</option>
                                                <option value="静岡県">静岡県</option>
                                                <option value="愛知県">愛知県</option>
                                                <option value="三重県">三重県</option>
                                                <option value="滋賀県">滋賀県</option>
                                                <option value="京都府">京都府</option>
                                                <option value="大阪府">大阪府</option>
                                                <option value="兵庫県">兵庫県</option>
                                                <option value="奈良県">奈良県</option>
                                                <option value="和歌山県">和歌山県</option>
                                                <option value="鳥取県">鳥取県</option>
                                                <option value="島根県">島根県</option>
                                                <option value="岡山県">岡山県</option>
                                                <option value="広島県">広島県</option>
                                                <option value="山口県">山口県</option>
                                                <option value="徳島県">徳島県</option>
                                                <option value="香川県">香川県</option>
                                                <option value="愛媛県">愛媛県</option>
                                                <option value="高知県">高知県</option>
                                                <option value="福岡県">福岡県</option>
                                                <option value="佐賀県">佐賀県</option>
                                                <option value="長崎県">長崎県</option>
                                                <option value="熊本県">熊本県</option>
                                                <option value="大分県">大分県</option>
                                                <option value="宮崎県">宮崎県</option>
                                                <option value="鹿児島県">鹿児島県</option>
                                                <option value="沖縄県">沖縄県</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-address__item">
                                        <input type="text" name="" value="{{ $entry->delivery_address }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__item">
                            <div class="form-block__head">契約会社</div>
                            <div class="form-block__cont">
                                <div class="c-selectBox --s">
                                    <select>
                                        <option disabled="disabled" value="">選択してください</option>
                                        <option selected="" value="FNJでんき＋東京ガス">FNJでんき＋東京ガス</option>
                                        <option selected="" value="FNJでんき＋FNJガス">FNJでんき＋FNJガス</option>
                                        <option selected="" value="まだ決めていない">まだ決めていない</option>
                                        <option selected="" value="選択肢にない">選択肢にない</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-block__btn">
                            <button type="submit" class="c-btn --bl --l">確認する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('backend/js/vendors/calendar/calendar.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.1/js/jquery.tablesorter.min.js"></script>
    <script src="{{ asset('backend/js/vendors/micromodal.min.js') }}"></script>
    <script src="{{ asset('backend/js/setting.js') }}"></script>
</body>

</html>
