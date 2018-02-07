<template>
    <div class="card">
    <div class="card-content">
        <span class="card-title">{{title}}</span>
        <table>
            <thead>
                <tr>
                    <th>{{threads}}</th>
                    <th>{{reply}}</th>
                    <th></th>
            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tópico legal direto do banco em realtime</td>
                    <td>3</td>
                    <td><a hred="#">{{open}}</a></td>
                </tr>
            </tbody>
        </table>   
    </div>
    </div>
</template>

<script>
    export default {
        
            props:[
                'title', 
                'threads',
                'reply',
                'open']

        
    }
</script>
