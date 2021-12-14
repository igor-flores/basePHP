<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-default">
        <tr>
            <th>Dia</th>
            <th>Horário</th>
            <th>Descrição</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody id="schedule-tbody">
        <tr>
            <td scope="row">
                <select class="form-select">
                    <option selected disabled> Selecione o dia </option>
                    <option> Domingo </option>
                    <option> Segunda </option>
                    <option> Terça </option>
                    <option> Quarta </option>
                    <option> Quinta </option>
                    <option> Sexta </option>
                    <option> Sábado </option>
                </select>
            </td>
            <td>
                <input type="time" class="form-control">
            </td>
            <td>
                <input type="text" class="form-control" placeholder="Descrição do evento">
            </td>
            <td>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-secondary" onclick="removeLine(this)"> - </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="d-grid gap-2">
    <button class="btn btn-outline-dark" id="add-line">Adicionar novo campo</button>
</div>

<script>
    document.querySelector('#add-line').addEventListener('click', function () {
        let tbody = document.querySelector('#schedule-tbody');
        let lineModel = '<td scope="row"> <select class="form-select"> <option selected disabled> Selecione o dia </option> <option> Domingo </option> <option> Segunda </option> <option> Terça </option> <option> Quarta </option> <option> Quinta </option> <option> Sexta </option> <option> Sábado </option> </select> </td> <td> <input type="time" class="form-control"> </td> <td> <input type="text" class="form-control" placeholder="Descrição do evento"> </td> <td> <div class="d-grid gap-2"> <button class="btn btn-outline-secondary" onclick="removeLine(this)"> - </button> </div> </td>';
        tbody.insertAdjacentHTML('beforeend', lineModel);
    });
    
    function removeLine(btn)
    {
        let tr = btn.parentElement.parentElement.parentElement
        tr.remove();
    }
    
</script>
