@extends('front.partials.app', ['title' => 'Profil - Herodoc', 'description' => 'Hesab məlumatlarınızız üzərində düzəliş edə bilərsiniz'])
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-white rounded shadow-sm sidebar-page-right">
                    <div>
                        <div class="p-3 border-bottom">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p style="color:red">{{ $error }}</p>
                                @endforeach
                            @endif
                            <form action="{{route('user.account.save')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$user->image}}">
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">PROFİL ŞƏKLİ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <img src="{{$user->image}}" width="150">
                                        <input type="file" name="image" style="width: 250px;"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">AD VƏ SOYAD</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="fullname"
                                            class="form-control font-weight-bold text-muted" value="{{$user->fullname}}">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">İSTİFADƏÇİ ADI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="username"
                                            class="form-control font-weight-bold text-muted" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">EMAIL</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email"
                                            class="form-control font-weight-bold text-muted"
                                            value="{{$user->email}}">
                                    </div>
                                </div>
                                @if($user->isFreelance == "yes")
                                    <div class="row d-flex align-items-center form-group">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">Vəzifə</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="jobname"
                                                class="form-control font-weight-bold text-muted" value="{{$user->jobname}}">
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center form-group">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">Təhsil</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="education"
                                                class="form-control font-weight-bold text-muted" value="{{$user->education}}">
                                        </div>
                                    </div>
                                    <div class="row form-group d-flex align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">Şəhər</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                @include('front.shared.city_select')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">Haqqınızda</p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea class="form-control" style="resize:none" name="description" id="exampleFormControlTextarea1" rows="7"
                                                placeholder="Məlumat...">{{$user->description}}</textarea> 
                                        </div>
                                    </div>

                                    
                                    <div class="row form-group d-flex align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">DİLLƏR</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                @php $languages = explode(',', $user->languages); @endphp
                                                <select multiple name="languages[]" data-placeholder="Dillər">
                                                    <option selected value="Azərbaycan dili" @if(in_array('Azərbaycan dili', $languages)) selected @endif>Azərbaycan dili</option>
                                                    <option value="Alman dili" @if(in_array('Alman dili', $languages)) selected @endif>Alman dili</option>
                                                    <option value="Çin dili" @if(in_array('Çin dili', $languages)) selected @endif>Çin dili</option>
                                                    <option value="Fransız dili" @if(in_array('Fransız dili', $languages)) selected @endif>Fransız dili</option>
                                                    <option value="İngilis dili" @if(in_array('İngilis dili', $languages)) selected @endif>İngilis dili</option>
                                                    <option value="İspan dili" @if(in_array('İspan dili', $languages)) selected @endif>İspan dili</option>
                                                    <option value="Koreya dili" @if(in_array('Koreya dili', $languages)) selected @endif>Koreya dili</option>
                                                    <option value="Türk dili" @if(in_array('Türk dili', $languages)) selected @endif>Türk dili</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group d-flex align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-muted font-weight-bold mb-0">BACARIQLAR</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="skills" class="form-control font-weight-bold text-muted"
                                                id="tag-input1" value="{{$user->skills}}">
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('save'))
                                    <p style="text-align: right;font-size: 15px;color: green;margin-top: 10px;">
                                        Məlumatlarınız dəyişdirildi
                                    </p>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-success">Yadda saxla</button>
                                </div>
                            </form>
                        </div>
                        <div class="p-3">
                            <form action="{{route('user.account.pass')}}" method="POST">
                                @csrf
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">KÖHNƏ ŞİFRƏ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="old_pass"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">YENİ ŞİFRƏ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="new_pass"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row d-flex align-items-center form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">YENİ ŞİFRƏ TƏKRARI</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" name="new_pass_r"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                @if(session()->has('new_pass_r'))
                                    <p style="text-align: right;font-size: 15px;color: red;margin-top: 10px;">
                                        Şifrələr uyğun gəlmir
                                    </p>
                                @endif
                                @if(session()->has('old_pass'))
                                    <p style="text-align: right;font-size: 15px;color: red;margin-top: 10px;">
                                        Köhnə şifrə düz deyil
                                    </p>
                                @endif
                                @if(session()->has('pass_succ'))
                                    <p style="text-align: right;font-size: 15px;color: green;margin-top: 10px;">
                                        Şifrəniz dəyişdirildi
                                    </p>
                                @endif
                                <div class="text-right">
                                    <button class="btn btn-success">Şifrəni dəyiş</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

        var select = $('select[multiple]');
        var options = select.find('option');

        var div = $('<div />').addClass('selectMultiple');
        var active = $('<div />');
        var list = $('<ul />');
        var placeholder = select.data('placeholder');

        var span = $('<span />').text(placeholder).appendTo(active);

        options.each(function() {
            var text = $(this).text();
            if($(this).is(':selected')) {
                active.append($('<a />').html('<em>' + text + '</em><i></i>'));
                span.addClass('hide');
            } else {
                list.append($('<li />').html(text));
            }
        });

        active.append($('<div />').addClass('arrow'));
        div.append(active).append(list);

        select.wrap(div);

        $(document).on('click', '.selectMultiple ul li', function(e) {
            var select = $(this).parent().parent();
            var li = $(this);
            if(!select.hasClass('clicked')) {
                select.addClass('clicked');
                li.prev().addClass('beforeRemove');
                li.next().addClass('afterRemove');
                li.addClass('remove');
                var a = $('<a />').addClass('notShown').html('<em>' + li.text() + '</em><i></i>').hide().appendTo(select.children('div'));
                a.slideDown(400, function() {
                    setTimeout(function() {
                        a.addClass('shown');
                        select.children('div').children('span').addClass('hide');
                        select.find('option:contains(' + li.text() + ')').prop('selected', true);
                    }, 500);
                });
                setTimeout(function() {
                    if(li.prev().is(':last-child')) {
                        li.prev().removeClass('beforeRemove');
                    }
                    if(li.next().is(':first-child')) {
                        li.next().removeClass('afterRemove');
                    }
                    setTimeout(function() {
                        li.prev().removeClass('beforeRemove');
                        li.next().removeClass('afterRemove');
                    }, 200);

                    li.slideUp(400, function() {
                        li.remove();
                        select.removeClass('clicked');
                    });
                }, 600);
            }
        });

        $(document).on('click', '.selectMultiple > div a', function(e) {
            var select = $(this).parent().parent();
            var self = $(this);
            self.removeClass().addClass('remove');
            select.addClass('open');
            setTimeout(function() {
                self.addClass('disappear');
                setTimeout(function() {
                    self.animate({
                        width: 0,
                        height: 0,
                        padding: 0,
                        margin: 0
                    }, 300, function() {
                        var li = $('<li />').text(self.children('em').text()).addClass('notShown').appendTo(select.find('ul'));
                        li.slideDown(400, function() {
                            li.addClass('show');
                            setTimeout(function() {
                                select.find('option:contains(' + self.children('em').text() + ')').prop('selected', false);
                                if(!select.find('option:selected').length) {
                                    select.children('div').children('span').removeClass('hide');
                                }
                                li.removeClass();
                            }, 400);
                        });
                        self.remove();
                    })
                }, 300);
            }, 400);
        });

        $(document).on('click', '.selectMultiple > div .arrow, .selectMultiple > div span', function(e) {
            $(this).parent().parent().toggleClass('open');
        });

        });


        (function() {
            "use strict"
            // Plugin Constructor
            var TagsInput = function(opts) {
                this.options = Object.assign(TagsInput.defaults, opts);
                this.init();
            }

            // Initialize the plugin
            TagsInput.prototype.init = function(opts) {
                this.options = opts ? Object.assign(this.options, opts) : this.options;

                if (this.initialized)
                    this.destroy();

                if (!(this.orignal_input = document.getElementById(this.options.selector))) {
                    console.error("tags-input couldn't find an element with the specified ID");
                    return this;
                }

                this.arr = [];
                this.wrapper = document.createElement('div');
                this.input = document.createElement('input');
                init(this);
                initEvents(this);

                this.initialized = true;
                return this;
            }

            // Add Tags
            TagsInput.prototype.addTag = function(string) {

                if (this.anyErrors(string))
                    return;

                this.arr.push(string);
                var tagInput = this;

                var tag = document.createElement('span');
                tag.className = this.options.tagClass;
                tag.innerText = string;

                var closeIcon = document.createElement('a');
                closeIcon.innerHTML = '&times;';

                // delete the tag when icon is clicked
                closeIcon.addEventListener('click', function(e) {
                    e.preventDefault();
                    var tag = this.parentNode;

                    for (var i = 0; i < tagInput.wrapper.childNodes.length; i++) {
                        if (tagInput.wrapper.childNodes[i] == tag)
                            tagInput.deleteTag(tag, i);
                    }
                })


                tag.appendChild(closeIcon);
                this.wrapper.insertBefore(tag, this.input);
                this.orignal_input.value = this.arr.join(',');

                return this;
            }

            // Delete Tags
            TagsInput.prototype.deleteTag = function(tag, i) {
                tag.remove();
                this.arr.splice(i, 1);
                this.orignal_input.value = this.arr.join(',');
                return this;
            }

            // Make sure input string have no error with the plugin
            TagsInput.prototype.anyErrors = function(string) {
                if (this.options.max != null && this.arr.length >= this.options.max) {
                    console.log('max tags limit reached');
                    return true;
                }

                if (!this.options.duplicate && this.arr.indexOf(string) != -1) {
                    console.log('duplicate found " ' + string + ' " ')
                    return true;
                }

                return false;
            }

            // Add tags programmatically 
            TagsInput.prototype.addData = function(array) {
                var plugin = this;

                array.forEach(function(string) {
                    plugin.addTag(string);
                })
                return this;
            }

            // Get the Input String
            TagsInput.prototype.getInputString = function() {
                return this.arr.join(',');
            }


            // destroy the plugin
            TagsInput.prototype.destroy = function() {
                this.orignal_input.removeAttribute('hidden');

                delete this.orignal_input;
                var self = this;

                Object.keys(this).forEach(function(key) {
                    if (self[key] instanceof HTMLElement)
                        self[key].remove();

                    if (key != 'options')
                        delete self[key];
                });

                this.initialized = false;
            }

            // Private function to initialize the tag input plugin
            function init(tags) {
                tags.wrapper.append(tags.input);
                tags.wrapper.classList.add(tags.options.wrapperClass);
                tags.orignal_input.setAttribute('hidden', 'true');
                tags.orignal_input.parentNode.insertBefore(tags.wrapper, tags.orignal_input);
            }

            // initialize the Events
            function initEvents(tags) {
                tags.wrapper.addEventListener('click', function() {
                    tags.input.focus();
                });


                tags.input.addEventListener('keydown', function(e) {
                    var str = tags.input.value.trim();

                    if (!!(~[9, 13, 188, 8, 32].indexOf(e.keyCode))) {
                        e.preventDefault();
                        tags.input.value = "";
                        if (str != "")
                            tags.addTag(str);
                    }

                });
            }


            // Set All the Default Values
            TagsInput.defaults = {
                selector: '',
                wrapperClass: 'tags-input-wrapper',
                tagClass: 'tag',
                max: null,
                duplicate: false
            }

            window.TagsInput = TagsInput;

        })();

        var tagInput1 = new TagsInput({
            selector: 'tag-input1',
            duplicate: false,
            max: 10
        });
        var array = "{{$user->skills}}";
        if(!jQuery.isEmptyObject(array)){
            tagInput1.addData( array.split(',') );
        }
    </script>
@endpush
@push('css')
    <style>
        .tags-input-wrapper {
            background: transparent;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc
        }

        .tags-input-wrapper input {
            border: none;
            background: transparent;
            outline: none;
            width: 140px;
            margin-left: 8px;
        }

        .tags-input-wrapper .tag {
            display: inline-block;
            background-color: #2cdd9b;
            color: white;
            border-radius: 40px;
            padding: 0px 3px 0px 7px;
            margin-right: 5px;
            margin-bottom: 5px;
            box-shadow: 0 5px 15px -2px rgba(29, 200, 204, .7)
        }

        .tags-input-wrapper .tag a {
            margin: 0 7px 3px;
            display: inline-block;
            cursor: pointer;
        }
        

        .selectMultiple {
            position: relative;
        }
        .selectMultiple select {
            display: none;
        }
        .selectMultiple > div {
            position: relative;
            z-index: 2;
            padding: 8px 12px 2px 12px;
            border-radius: 8px;
            background: #fff;
            font-size: 14px;
            min-height: 44px;
            box-shadow: 0 4px 16px 0 rgba(22, 42, 90, .12);
            transition: box-shadow 0.3s ease;
        }
        .selectMultiple > div:hover {
            box-shadow: 0 4px 24px -1px rgba(22, 42, 90, .16);
        }
        .selectMultiple > div .arrow {
            right: 1px;
            top: 0;
            bottom: 0;
            cursor: pointer;
            width: 28px;
            position: absolute;
        }
        .selectMultiple > div .arrow:before, .selectMultiple > div .arrow:after {
            content: '';
            position: absolute;
            display: block;
            width: 2px;
            height: 8px;
            border-bottom: 8px solid #99a3ba;
            top: 43%;
            transition: all 0.3s ease;
        }
        .selectMultiple > div .arrow:before {
            right: 12px;
            transform: rotate(-130deg);
        }
        .selectMultiple > div .arrow:after {
            left: 9px;
            transform: rotate(130deg);
        }
        .selectMultiple > div span {
            color: #99a3ba;
            display: block;
            position: absolute;
            left: 12px;
            cursor: pointer;
            top: 8px;
            line-height: 28px;
            transition: all 0.3s ease;
        }
        .selectMultiple > div span.hide {
            opacity: 0;
            visibility: hidden;
            transform: translate(-4px, 0);
        }
        .selectMultiple > div a {
            position: relative;
            padding: 0 24px 6px 8px;
            line-height: 28px;
            color: #1e2330;
            display: inline-block;
            vertical-align: top;
            margin: 0 6px 0 0;
        }
        .selectMultiple > div a em {
            font-style: normal;
            display: block;
            white-space: nowrap;
        }
        .selectMultiple > div a:before {
            content: '';
            left: 0;
            top: 0;
            bottom: 6px;
            width: 100%;
            position: absolute;
            display: block;
            background: rgba(228, 236, 250, .7);
            z-index: -1;
            border-radius: 4px;
        }
        .selectMultiple > div a i {
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            width: 24px;
            height: 28px;
            display: block;
        }
        .selectMultiple > div a i:before, .selectMultiple > div a i:after {
            content: '';
            display: block;
            width: 2px;
            height: 10px;
            position: absolute;
            left: 50%;
            top: 50%;
            background: #2cdd9b;
            border-radius: 1px;
        }
        .selectMultiple > div a i:before {
            transform: translate(-50%, -50%) rotate(45deg);
        }
        .selectMultiple > div a i:after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }
        .selectMultiple > div a.notShown {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .selectMultiple > div a.notShown:before {
            width: 28px;
            transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
        }
        .selectMultiple > div a.notShown i {
            opacity: 0;
            transition: all 0.3s ease 0.3s;
        }
        .selectMultiple > div a.notShown em {
            opacity: 0;
            transform: translate(-6px, 0);
            transition: all 0.4s ease 0.3s;
        }
        .selectMultiple > div a.notShown.shown {
            opacity: 1;
        }
        .selectMultiple > div a.notShown.shown:before {
            width: 100%;
        }
        .selectMultiple > div a.notShown.shown i {
            opacity: 1;
        }
        .selectMultiple > div a.notShown.shown em {
            opacity: 1;
            transform: translate(0, 0);
        }
        .selectMultiple > div a.remove:before {
            width: 28px;
            transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
        }
        .selectMultiple > div a.remove i {
            opacity: 0;
            transition: all 0.3s ease 0s;
        }
        .selectMultiple > div a.remove em {
            opacity: 0;
            transform: translate(-12px, 0);
            transition: all 0.4s ease 0s;
        }
        .selectMultiple > div a.remove.disappear {
            opacity: 0;
            transition: opacity 0.5s ease 0s;
        }
        .selectMultiple > ul {
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: 16px;
            z-index: 1;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            visibility: hidden;
            opacity: 0;
            border-radius: 8px;
            transform: translate(0, 20px) scale(0.8);
            transform-origin: 0 0;
            filter: drop-shadow(0 12px 20px rgba(22, 42, 90, .08));
            transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
        }
        .selectMultiple > ul li {
            color: #1e2330;
            background: #fff;
            padding: 12px 16px;
            cursor: pointer;
            overflow: hidden;
            position: relative;
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
        }
        .selectMultiple > ul li:first-child {
            border-radius: 8px 8px 0 0;
        }
        .selectMultiple > ul li:first-child:last-child {
            border-radius: 8px;
        }
        .selectMultiple > ul li:last-child {
            border-radius: 0 0 8px 8px;
        }
        .selectMultiple > ul li:last-child:first-child {
            border-radius: 8px;
        }
        .selectMultiple > ul li:hover {
            background: #2cdd9b;
            color: #fff;
        }
        .selectMultiple > ul li:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 6px;
            height: 6px;
            background: rgba(0, 0, 0, .4);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%, -50%);
            transform-origin: 50% 50%;
        }
        .selectMultiple > ul li.beforeRemove {
            border-radius: 0 0 8px 8px;
        }
        .selectMultiple > ul li.beforeRemove:first-child {
            border-radius: 8px;
        }
        .selectMultiple > ul li.afterRemove {
            border-radius: 8px 8px 0 0;
        }
        .selectMultiple > ul li.afterRemove:last-child {
            border-radius: 8px;
        }
        .selectMultiple > ul li.remove {
            transform: scale(0);
            opacity: 0;
        }
        .selectMultiple > ul li.remove:after {
            animation: ripple 0.4s ease-out;
        }
        .selectMultiple > ul li.notShown {
            display: none;
            transform: scale(0);
            opacity: 0;
            transition: transform 0.35s ease, opacity 0.4s ease;
        }
        .selectMultiple > ul li.notShown.show {
            transform: scale(1);
            opacity: 1;
        }
        .selectMultiple.open > div {
            box-shadow: 0 4px 20px -1px rgba(22, 42, 90, .12);
        }
        .selectMultiple.open > div .arrow:before {
            transform: rotate(-50deg);
        }
        .selectMultiple.open > div .arrow:after {
            transform: rotate(50deg);
        }
        .selectMultiple.open > ul {
            transform: translate(0, 12px) scale(1);
            opacity: 1;
            visibility: visible;
            filter: drop-shadow(0 16px 24px rgba(22, 42, 90, .16));
        }
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 1;
            }
            25% {
                transform: scale(30, 30);
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: scale(50, 50);
            }
        }
    </style>
@endpush
