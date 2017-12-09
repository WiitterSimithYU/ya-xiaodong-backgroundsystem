<style>
    .detail_title {
        width: 15%;
    }

    .detail_title + td {
        width: 20%;
    }
</style>

<div class="detail_body">
    <table class="table">
        <thead>
        <tr>
            <th colspan="6">参与者信息</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td class="detail_title">姓名：</td>
            <td><?php echo $model['nick_name']; ?></td>
            <td class="detail_title">就职酒店：</td>
            <td><?php echo $model['hotel']; ?></td>
            <td class="detail_title">参与时间：</td>
            <td><?php echo date("Y-m-d H:i:s", $model['create_time']); ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th colspan="1">问卷详情</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q1：您对今晚的活动是否满意？</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q1']; ?></td>
        </tr>

        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q2：你觉得此次酒店自助餐烧烤档特色大全对您开发菜谱或创新菜品有帮助么？</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q2']; ?></td>
        </tr>

        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q3：您对今天分享的哪道菜谱／汁酱（腌料、蘸料）最有印象？</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q3']; ?></td>
        </tr>

        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q4：您会将这道菜／汁酱运用道您的烧烤档中去吗？</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q4']; ?></td>
        </tr>

        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q5：您对联合利华饮食策划旗下的哪一款产品感兴趣？</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q5']; ?></td>
        </tr>

        <tr>
            <td class="detail_title" style="color: #000000;font-weight: 700;">Q6：您对本次活动还有其它建议吗？（例如了解其它特色烧烤主题、其它特色汁酱等）</td>
        </tr>

        <tr>
            <td class="detail_title" style="padding-left: 40px;"><?php echo $model['answer']['q6']; ?></td>
        </tr>


        </tbody>
    </table>


</div>

