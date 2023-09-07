<tr>
    <th scope="row"><?php echo $id; ?></th>
    <td><?php echo $title; ?></td>
    <td><?php echo $author; ?></td>
    <td><?php echo $time; ?></td>
    <td>
        <a class="btn btn-link" href="<?php echo $url_path; echo $permalink; ?>" role="button">View post</a>
    </td>
    <td>
        <a class="btn btn-primary btn-sm" href="<?php echo $url_path; ?>edit.php?id=<?php echo $id; ?>" role="button">Edit</a>
        <a class="btn btn-danger btn-sm" href="<?php echo $url_path; ?>del.php?id=<?php echo $id; ?>" role="button">Delete</a>
    </td>
</tr>
