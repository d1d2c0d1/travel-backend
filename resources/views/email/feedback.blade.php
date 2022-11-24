<h1>#000{{$feedback->id}}: Новое обращение от пользователя сервиса U-Gid</h1>
<br />
<table>
    @if($user && $user?->id >= 1)
        <tr>
            <td colspan="2"><b>Даннные пользователя</b></td>
        </tr>
        <tr>
            <td colspan="2"><i>запрос отправлен от авторизованного пользователя</i></td>
        </tr>
        <tr>
            <td>ID:</td>
            <td>{{$user->id}}</td>
        </tr>
        <tr>
            <td>Имя:</td>
            <td>{{$user->name}}</td>
        </tr>
    @else
        <tr>
            <td colspan="2"><i>запрос отправлен от не авторизованного пользователя</i></td>
        </tr>
    @endif
    <tr>
        <td colspan="2"><b>Данные из формы запроса</b></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{$feedback->email}}</td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td>{{$feedback->phone}}</td>
    </tr>
    <tr>
        <td>Сообщение клиента:</td>
        <td>{{$feedback->question}}</td>
    </tr>

    <tr>
        <td colspan="2"><i>Системные данные</i></td>
    </tr>
    <tr>
        <td>IP:</td>
        <td>{{$feedback->ip}}</td>
    </tr>
    <tr>
        <td>Дата отправки:</td>
        <td>{{date('d.m.Y в H:i', strtotime($feedback->created_at))}}</td>
    </tr>
    <tr>
        <td>UserAgent:</td>
        <td>{{$feedback->user_agent}}</td>
    </tr>
</table>
<br /><br />
<i>На данное сообщение не нужно отвечать, так как оно было сформировано автоматически!</i>
