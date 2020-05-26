<?php
class ProductCustomField
{
    // DB stuff
    private $conn;
    private $table = 'product_custom_field';

    // Product Properties
    public $id;
    public $name;
    public $field_type;
    public $detail_view;
    public $add_view;
    public $visible_to;
    public $active_flag;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get label
    public function read()
    {
        // // Create query
        // $query = 'SELECT c.name as category_name, p.id, p.name, p.product_code, p.category, p.price
        //                             FROM ' . $this->table . ' p
        //                             LEFT JOIN
        //                               categories c ON p.category_id = c.id
        //                             ORDER BY
        //                               p.created_at DESC';
        // Create query
        $query = 'SELECT id,name,field_type,detail_view,add_view,visible_to,active_flag FROM ' . $this->table;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                                    FROM ' . $this->table . ' p
                                    LEFT JOIN
                                      categories c ON p.category_id = c.id
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name,field_type = :field_type,detail_view = :detail_view,add_view = :add_view,visible_to = :visible_to,active_flag = :active_flag';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->name = htmlspecialchars(strip_tags($this->field_type));
        $this->name = htmlspecialchars(strip_tags($this->detail_view));
        $this->name = htmlspecialchars(strip_tags($this->add_view));
        $this->team_manager = htmlspecialchars(strip_tags($this->visible_to));
        $this->team_description = htmlspecialchars(strip_tags($this->active_flag));

        // Bind data
        $stmt->bindParam('name', $this->name);
        $stmt->bindParam('field_type', $this->field_type);
        $stmt->bindParam('detail_view', $this->detail_view);
        $stmt->bindParam('add_view', $this->add_view);
        $stmt->bindParam('visible_to', $this->visible_to);
        $stmt->bindParam('active_flag', $this->active_flag);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Post
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                                SET title = :title, body = :body, author = :author, category_id = :category_id
                                WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}