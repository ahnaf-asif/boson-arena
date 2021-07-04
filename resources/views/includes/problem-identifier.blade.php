<div class="input-group mb-2">
    <div class="form-outline" style="width: 75%;">
        <input style="color: #c2c2c2;" value="{{$current_problem->identifier}}" class="form-control " id="unique_identifier{{$current_problem->id}}" style="font-size: 15px !important;" />
    </div>
    <div class="hudai" style="width: 25%; height: 100%;">
        <button style="width: 100%; height: 40px;"
                onclick="
                    const elem = document.createElement('textarea');
                    elem.value = '{{$current_problem->identifier}}';
                    document.body.appendChild(elem);
                    elem.select();
                    document.execCommand('copy');
                    document.body.removeChild(elem);

                    this.classList.add('copied');
                    this.innerText = 'copied';

                    setTimeout(()=>{
                    this.innerText = 'copy';
                    this.classList.remove('copied');
                    }, 5000);

                    "

                class="btn btn-info btn-copy">
            Copy
        </button>
    </div>
</div>
