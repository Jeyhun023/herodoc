@extends('front.partials.app')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-white rounded shadow-sm sidebar-page-right">
                        <div>
                            <div class="p-3 border-bottom" style="text-align: center">
                                <img src="{{ asset('/front/images/logo.png') }}" width="200">
                            </div>
                            @if(session()->has('success'))
                                <p style="text-align: center;font-size: 15px;color: green;margin-top: 10px;">Təbriklər! Mesajınız göndərildi. Ən qısa vaxtda sizə geri dönüş ediləcək</p>
                            @endif
                            <form method="POST" action="{{route('become.freelancerFormPost')}}">
                                @csrf
                            <div class="p-3 border-bottom">
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">AD VƏ SOYAD</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="fullname" class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">TƏHSİL PİLLƏSİ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="education_level" id="education_level" class="form-control">
                                                <option selected disabled>-- Birini seçin --</option>
                                                <option value="bachelor">BAKALVR</option>
                                                <option value="master">MAGİSTRANT</option>
                                                <option value="doctora">DOKTORANT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">OXUDUĞUNUZ TƏHSİL MÜƏSSİSƏSİ</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="education"
                                            class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">BACARIQLAR</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="skills" class="form-control font-weight-bold text-muted"
                                            id="tag-input1">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ELAN HAQQINDA</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="7"
                                            placeholder="Məlumat..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom">
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">EMAİL</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">TELEFON</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="phone" class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="row form-group d-flex align-items-center">
                                    <div class="col-md-4">
                                        <p class="text-muted font-weight-bold mb-0">ÜNVAN</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="address" class="form-control font-weight-bold text-muted">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">GÖNDƏR</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
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

    </style>
@endpush
