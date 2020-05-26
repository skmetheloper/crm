<?php
class Team
{
    // DB stuff
    private $conn;
    private $table = 'team';

    // Product Properties
    public $team_id;
    public $team_name;
    public $team_manager;
    public $team_description;
    public $team_members;

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
        $query = 'SELECT team_id,team_name,team_manager,team_description,team_members FROM ' . $this->table;


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
        $query = 'INSERT INTO ' . $this->table . ' SET team_name = :team_name,team_manager = :team_manager,team_description = :team_description,team_members = :team_members';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->team_name = htmlspecialchars(strip_tags($this->team_name));
        $this->team_manager = htmlspecialchars(strip_tags($this->team_manager));
        $this->team_description = htmlspecialchars(strip_tags($this->team_description));
        $this->team_members = htmlspecialchars(strip_tags($this->team_members));

        // Bind data
        $stmt->bindParam('team_name', $this->team_name);
        $stmt->bindParam('team_manager', $this->team_manager);
        $stmt->bindParam('team_description', $this->team_description);
        $stmt->bindParam('team_members', $this->team_members);

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