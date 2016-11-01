@extends('layouts.app')

@section('title', 'Profile')

@section('css')
<link rel="stylesheet" href="/css/profile.css" media="screen">
@endsection

@section('content')

<div class="clearStyle">
  <div class="container">
    <div class="row">

      <!-- person information -->
      <div class="profileInfo">
        <div class="col-md-2">
          @foreach($user as $u)
            <img src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}" class="profileImg" />
        </div>

        <div class="col-md-5 profileInformation">
          <h2>
              {{ $u->name }} 's Profile
          </h2>
          <p>
            <span class="displayInfor">
              <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email:{{$u->email}}&nbsp;
              <span class="addEdit"><i class="fa fa-pencil  editColor">编辑</i></span>
            </span>
            <div class="addInfor">
              <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" class="input-sm tagsInput form-control mr10" name="email"><button type="button" class="btn btn-sm btn-primary" name="save">save</button>
            </div>
          </p>
          <p>
            <span class="displayInfor">
              <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;location:{{$u->email}}&nbsp;
              <span class="addEdit"><i class="fa fa-pencil  editColor">编辑</i></span>
            </span>
            <div class="addInfor">
              <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" class="input-sm tagsInput form-control mr10" name="city"><button type="button" class="btn btn-sm btn-primary" name="save">save</button>
            </div>
          </p>
          <p>
            <span class="displayInfor">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;degree:{{$u->email}}&nbsp;
              <span class="addEdit">
                <i class="fa fa-pencil  editColor">编辑</i>
              </span>
            </span>
            <div class="addInfor">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" class="input-sm tagsInput form-control mr10" name="degree"><button type="button" class="btn btn-sm btn-primary" name="save">save</button>
            </div>
          </p>
          <p>
            <span class="displayInfor">
              <i class="fa fa-link" aria-hidden="true"></i>&nbsp;&nbsp;link:{{$u->email}}&nbsp;
              <span class="addEdit">
                <i class="fa fa-pencil  editColor">编辑</i>
              </span>
            </span>
            <div class="addInfor">
              <i class="fa fa-link" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" class="input-sm tagsInput form-control mr10" name="link"><button type="button" class="btn btn-sm btn-primary" name="save">save</button>
            </div>
          </p>
        </div>

        <div class="col-md-5">
            <div class="panel panel-defaul profileIntro">
              <div class="panel panel-heading profileIntroHeader">
                <div class="circleApple">
                  <span class="circleRed circle"></span>&nbsp;
                  <span class="circleOrange circle"></span>&nbsp;
                  <span class="circleGreen circle"></span>
                </div>
                <div class="profileEdit"><span class="addIntro"><i class="fa fa-pencil"></i>编辑</span></div>
              </div>

              <!-- doesn't have introduce item in user table,you need add introduce,otherwise have problem -->
              <ul class="profileIntroContent">
                <li class="introDetaile">
                  @if($u->introduce)
                  <p>{{$u->introduce}}</p>
                  @else
                  <p>还没有简介<a href="javascript:;" class="addIntro">立即添加</a></p>
                  @endif
                </li>
                <li class="introDetaile introDetailHide">
                  <textarea class="form-control"  rows="3">
                    {{$u->introduce}}
                  </textarea>
                  <button type="button" class="btn btn-primary saveBtn" name="save">save</button>
                  <button type="button" class="btn btn-default cancelBtn" name="cancel">cancel</button>
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-2 proflieLeftAside">

        <div class="col-md-6 profileFocusRen">
            <span>关注了</span>
            <span class="profileFocus">
              10人
            </span>
        </div>

        <div class="col-md-6 profileFans">
          <span>粉丝</span>
          <span class="profileFocus">
            10人
          </span>
        </div>
        <div class="profileListmenu">
            <ul class="nav nav-pills nav-stacked" role="tablist">
              <li class="profileDividerLine">
                <a href="#" ></a>
              </li>
              <li role="presentation" class="profileActive">
                <a href="#">
                  <span>主页</span>
                </a>
              </li>
              <li role="presentation">
                <a href="#">
                  <span class="leftarea">回答</span>
                  <span class="rightarea">20</span>
                </a>
              </li>
              <li role="presentation">
                <a href="#">
                  <span class="leftarea">提问</span>
                  <span class="rightarea">10</span>
                </a>
              </li>
              <li role="presentation">
                <a href="#">
                  <span class="leftarea">标签</span>
                  <span class="rightarea">5</span>
                </a>
              </li>
            </ul>
          </div>
      </div>

      <div class="col-md-7">
        <div class="panel panel-defaul highMarks">
          <div class="panel-heading highHead">高分内容</div>
          <ul class="list-group">
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="questionList list-group-item">
                <span class="leftarea">提问</span>
                <span class="profileTags leftarea">2票</span>
                <a href="#" class="questionDetail leftarea">上传文件时的错误提示</a>
              </li>
            </ul>
        </div>
      </div>

      <div class="col-md-3">
        <div class="profileSkill">
          <div>擅长技能</div>
          <div class="profileSkillList">
            <span class="leftarea profileTags">asp.net</span>
          </div>
        </div>
        <div>
          <div class="profileCreateat">注册于{{$u->created_at}}</div>
        </div>
      </div>
    </div>
  </div>

    @endforeach
</div>
@endsection
@section('js')
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
