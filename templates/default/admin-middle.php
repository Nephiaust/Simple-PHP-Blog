<tr>
    <th scope="row"><?php echo $id; ?></th>
    <td><?php echo $title; ?></td>
    <td><?php echo $author; ?></td>
    <td><?php echo $time; ?></td>
    <td>
        <a class="btn btn-link" href="<?php echo $url_path;
                                        echo $permalink; ?>" role="button">View post</a>
    </td>
    <td>
        <div class="modal fade" id="Modal<?php echo $id; ?>" tabindex="-1" aria-labelledby="Modal<?php echo $id; ?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="Modal<?php echo $id; ?>Label">Confirm Deletion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <a class="btn btn-danger" href="<?php echo $url_path; ?>del.php?id=<?php echo $id; ?>" role="button">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary btn-sm" href="<?php echo $url_path; ?>edit.php?id=<?php echo $id; ?>" role="button">Edit</a>
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $id; ?>">Delete</button>
    </td>
</tr>