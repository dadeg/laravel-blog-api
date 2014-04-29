<?php
 

class CommentsControllerTest extends TestCase {
 
  /**
   ************************************************************************
   * Basic Route Tests
   * notice that we can use our route() helper here!
   ************************************************************************
   */
 
  //test that GET /v1/posts/1/comments returns HTTP 200
  public function testIndex()
  {
    $response = $this->call('GET', route('v1.posts.comments.index', array(1)) );
    $this->assertTrue($response->isOk());
  }
 
  //test that GET /v1/posts/1/comments/1 returns HTTP 200
  public function testShow()
  {
    $response = $this->call('GET', route('v1.posts.comments.show', array(1,1)) );
    $this->assertTrue($response->isOk());
  }
 
  //test that GET /v1/posts/1/comments/create returns HTTP 200
  public function testCreate()
  {
    $response = $this->call('GET', route('v1.posts.comments.create', array(1)) );
    $this->assertTrue($response->isOk());
  }
 
  //test that GET /v1/posts/1/comments/1/edit returns HTTP 200
  public function testEdit()
  {
    $response = $this->call('GET', route('v1.posts.comments.edit', array(1,1)) );
    $this->assertTrue($response->isOk());
  }
 
  /**
   *************************************************************************
   * Tests to ensure that the controller calls the repo as we expect
   * notice we are "Mocking" our repository
   *
   * also notice that we do not really care about the data or interactions
   * we merely care that the controller is doing what we are going to want
   * it to do, which is reach out to our repository for more information
   *************************************************************************
   */
 
  //ensure that the index function calls our repository's "findAll" method
  public function testIndexShouldCallFindAllMethod()
  {
    //create our new Mockery object with a name of CommentRepositoryInterface
    $mock = Mockery::mock('CommentRepositoryInterface');
 
    //inform the Mockery object that the "findAll" method should be called on it once
    //and return a string value of "foo"
    $mock->shouldReceive('findAll')->once()->andReturn('foo');
 
    //inform our application that we have an instance that it should use
    //whenever the CommentRepositoryInterface is requested
    App::instance('CommentRepositoryInterface', $mock);
 
    //call our controller route
    $response = $this->call('GET', route('v1.posts.comments.index', array(1,1)));
 
    //assert that the response is a boolean value of true
    $this->assertTrue(!! $response->original);
  }
 
  //ensure that the show method calls our repository's "findById" method
  public function testShowShouldCallFindById()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn('foo');
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.posts.comments.show', array(1,1)));
    $this->assertTrue(!! $response->original);
  }
 
  //ensure that our create method calls the "instance" method on the repository
  public function testCreateShouldCallInstanceMethod()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('instance')->once()->andReturn(array());
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.posts.comments.create', array(1)));
    $this->assertViewHas('comment');
  }
 
  //ensure that the edit method calls our repository's "findById" method
  public function testEditShouldCallFindByIdMethod()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('findById')->once()->andReturn(array());
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('GET', route('v1.posts.comments.edit', array(1,1)));
    $this->assertViewHas('comment');
  }
 
  //ensure that the store method should call the repository's "store" method
  public function testStoreShouldCallStoreMethod()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('store')->once()->andReturn('foo');
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('POST', route('v1.posts.comments.store', array(1)));
    $this->assertTrue(!! $response->original);
  }
 
  //ensure that the update method should call the repository's "update" method
  public function testUpdateShouldCallUpdateMethod()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('update')->once()->andReturn('foo');
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('PUT', route('v1.posts.comments.update', array(1,1)));
    $this->assertTrue(!! $response->original);
  }
 
  //ensure that the destroy method should call the repositories "destroy" method
  public function testDestroyShouldCallDestroyMethod()
  {
    $mock = Mockery::mock('CommentRepositoryInterface');
    $mock->shouldReceive('destroy')->once()->andReturn(true);
    App::instance('CommentRepositoryInterface', $mock);
 
    $response = $this->call('DELETE', route('v1.posts.comments.destroy', array(1,1)));
    $this->assertTrue( empty($response->original) );
  }
 
 
}
