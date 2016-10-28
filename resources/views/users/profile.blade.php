@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="clear_style">
  <div class="container">
    <div class="row">

      <!-- person information -->
      <div class="profile_info">
        <div class="col-md-2">@foreach($user as $u)
            <img src="/uploads/avatars/{{ $u->avatar }}" alt="{{ $u->avatar }}" class="profile_img" />
        </div>

        <div class="col-md-5">
          <h2>
              {{ $u->name }} 's Profile
          </h2>
          <p>
            <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;邮箱:{{$u->email}}&nbsp;<span class="addInfor"><i class="fa fa-pencil  edit_Color">编辑</i></span>
          </p>
          @if ($u->isactive)
          <p>
            <i class="fa fa-heart" aria-hidden="true" style="padding-left: 2px;"></i><span>&nbsp;状态:</span>online&nbsp;<span class="addInfor"><i class="fa fa-pencil  edit_Color">编辑</i></span>
          </p>
          @else
          <p>
            <i class="fa fa-heart-o" aria-hidden="true" style="padding-left: 2px;"></i><span>&nbsp;状态:</span>offline
          </p>
          @endif
          <p>last time login: {{ $u->updated_at }}</p>
          <!-- style="position: relative; bottom: 30px; left: 100px;" -->
        </div>

        <div class="col-md-5">
            <div class="panel panel-defaul profile_intro">
              <div class="panel panel-heading profile_intro_header">
                <div class="circle_apple">
                  <span class="circle_red circle"></span>&nbsp;
                  <span class="circle_orange circle"></span>&nbsp;
                  <span class="circle_green circle"></span>
                </div>
                <div class="profile_edit"><span class="addIntro"><i class="fa fa-pencil"></i>编辑</span></div>
              </div>
              <ul class="profile_intro_content">
                <li class="intro_detaile">
                  @if($u->introduce)
                  <p>{{$u->introduce}}</p>
                  @else
                  <p>还没有简介<a href="javascript:;" class="addIntro">立即添加</a></p>
                  @endif
                </li>
                <li class="intro_detaile intro_detail_hide">
                  <textarea class="form-control"  rows="3">
                    {{$u->introduce}}
                  </textarea>
                  <button type="button" class="btn btn-primary save_btn" name="save">save</button>
                  <button type="button" class="btn btn-default cancel_btn" name="cancel">cancel</button>
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
      <div class="col-md-2 proflie_left_aside">

        <div class="col-md-6 col-xs-12 proflie_focus_ren">
            <span>关注了</span>
            <span class="profile_focus">
              10人
            </span>
        </div>

        <div class="col-md-6 col-xs-12 proflie_focus_ren">
          <span>粉丝</span>
          <div class="profile_focus">
            10人
          </div>
        </div>
        <div class="profile_listmenu">
            <ul class="nav nav-pills nav-stacked" role="tablist">
              <li class="profile_divider_line">
                <a href="#" ></a>
              </li>
              <li role="presentation" class="profile_active">
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
        <div class="panel panel-defaul highmarks">
          <div class="panel-heading high_head">高分内容</div>
          <ul class="list-group">
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
              <li class="question_list list-group-item">
                <span class="leftarea">提问</span>
                <span class="profile_tags leftarea">2票</span>
                <a href="#" class="question_detail leftarea">上传文件时的错误提示</a>
              </li>
            </ul>
        </div>
      </div>

      <div class="col-md-3">
        <div class="profile_skill">
          <div>擅长技能</div>
          <div class="profile_skill_list">
            <span class="leftarea profile_tags">asp.net</span>
          </div>
        </div>
        <div>
          <div class="profile_createat">注册于{{$u->created_at}}</div>
        </div>
      </div>
    </div>
  </div>

    @endforeach
</div>
@endsection
@section('js')
<script src="{{ asset('js/tag.js') }}"></script>
@endsection
